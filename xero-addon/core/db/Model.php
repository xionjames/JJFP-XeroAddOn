<?php

namespace JJFP\Db;

use JJFP\Common\Constants;
use JJFP\Common\MyLogger;
use JJFP\Config\Config;
use JJFP\Xero\Retriever;

abstract class Model {
    private $data = array();
    private $collection;
    private $cfg;
    protected $key;
    protected $fields;
    protected $logger;
    private $db;
    private $inserted = 0;
    private $matched  = 0;
    private $modified = 0;

    const XERO_ID_FIELD = 'xero_id';

    public const UPDATE = 0;
    public const INSERT = 1;
    public const FIND   = 2;


    public function __construct() {
        $this->collection = strtolower((new \ReflectionClass($this))->getShortName());//strtolower(get_class($this));

        $this->cfg = Config::getInstance();
        $this->cfg->load();

        $this->logger = MyLogger::getLogger();
    }

    /**
     * Receives the data array
     */
    public function set($data) {
        $this->data = $this->cleanData($data);
    }

    /**
     * Clean all data entries
     */
    private function cleanData($data) {
        $new = array();

        foreach ($data as $entry) {
            $newEntry = $this->clean($entry);
            array_push($new, $newEntry);
        }

        return $new;
    }

    /**
     * Clean one entry
     */
    private function clean($entry) {
        $newEntry = array();
        foreach ($this->fields as $field) {
            if (isset($entry[$field])) {
                $newEntry[$field == $this->key ? Model::XERO_ID_FIELD : $field] = $entry[$field];
            }
        }

        return $newEntry;
    }

    /**
     * Insert/Update the data entries into Database
     */
    public function save() {
        if (!is_array($this->data)) {
            $this->logger->info("Nothing to save: $this->data");
            return false;
        }

        try {
            $coll = $this->getCollectionObj();

            // save!
            $this->logger->info("Inserting/Updating " . sizeof($this->data) . " records...");
            
            foreach ($this->data as $entry) {
                $result = $coll->updateOne( 
                    [ Model::XERO_ID_FIELD => $entry[Model::XERO_ID_FIELD] ],
                    [ '$set' => $this->includeSavedDate($entry) ], 
                    [ 'upsert' => true ] 
                );

                // calculate results
                $this->inserted += $result->getUpsertedCount();
                $this->matched  += $result->getMatchedCount();
                $this->modified += $result->getModifiedCount();
            }

        } catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e) {
            $this->logger->error("Error connecting to database " . $e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Attempt to connect to Mongo and obtain "collection" object
     */
    private function getCollectionObj() {
        // connect
        $this->logger->info("Connecting to database...");

        $mongoClient = new \MongoDB\Client($this->getMongoUri());

        $this->logger->info("Getting Collection $this->collection...");
        $coll = $mongoClient->{$this->db}->{$this->collection};

        return $coll;
    }

    /**
     * Add new field SavedAt for every retrieved record from Xero
     */
    private function includeSavedDate($entry) {
        return array_merge($entry, array( "SavedAt" => $this->getUTCDate() ));
    }

    /**
     * Obtain a String UTC date
     */
    protected function getUTCDate() {
        $date = gmdate('Y-m-d', time());
        $time = gmdate('H:i:s', time());

        return $date . 'T' . $time . '+00:00';
    }

    /**
     * Build Mongo Connection URI
     */
    private function getMongoUri() {
        $user = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_USER);
        $pass = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_PASSWORD);
        $this->db = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_DATABASE);
        $host = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_HOST);

        $uri = "mongodb://$user:$pass@$host/$this->db?ssl=false";
    }

    /**
     * Get results of "normal" process
     */
    public function getResults() {
        return array(
            "inserted" => $this->inserted,
            "matched"  => $this->matched,
            "modified" => $this->modified
        );
    }

    /**
     * Just for special cases.
     * Executes a "custom" mongo operation
     */
    public function exec($operation, $first = array(), $second = array(), $third = array()) {
        try {
            $coll = $this->getCollectionObj();

            switch ($operation) {
                case Model::FIND:
                    $this->logger->debug("Finding...");

                    $result = $coll->find($first);

                    return $result;
                    break;

                case Model::INSERT:
                    $this->logger->debug("Inserting new record...");

                    $result = $coll->insertOne($first);

                    $this->logger->info("New record inserted with ID: " . $result->getInsertedId());

                    return $result->getInsertedId();
                    break;

                case Model::UPDATE:
                    $this->logger->debug("Updating record " . implode(',', $first));

                    $result = $coll->updateOne(
                        $first,
                        $second,
                        $third
                    );

                    $this->logger->info("Updating result count: " . $result->getModifiedCount());

                    return $result->getModifiedCount();
                    break;
            }

        } catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e) {
            $this->logger->error("Error connecting to database " . $e->getMessage());
            return null;
        }
    }
}

?>