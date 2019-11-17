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
    private $logger;
    private $db;
    const XERO_ID_FIELD = 'xero_id';

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
        $this->logger->debug("Original entry field count: " . sizeof($entry));

        $newEntry = array();
        foreach ($this->fields as $field) {
            if (isset($entry[$field])) {
                $newEntry[$field == $this->key ? Model::XERO_ID_FIELD : $field] = $entry[$field];
            }
        }

        $this->logger->debug("Cleaned entry field count: " . sizeof($newEntry));

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

        // connect
        $this->logger->info("Connecting to database...");

        try {
            $mongoClient = new \MongoDB\Client($this->getMongoUri());

            $this->logger->info("Getting Collection $this->collection...");
            $coll = $mongoClient->{$this->db}->{$this->collection};

            // save!
            $this->logger->info("Inserting/Updating " . sizeof($this->data) . " records...");
            $modifieds = array();
            foreach ($this->data as $entry) {
                $result = $coll->updateOne( 
                    [ Model::XERO_ID_FIELD => $entry[Model::XERO_ID_FIELD] ],
                    [ '$set' => $entry ], 
                    [ 'upsert' => true ] 
                );
                array_push($modifieds, $result->getModifiedCount());
            }


        } catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e)
        {
            $this->logger->error("Error connecting to database " . $e->getMessage());
        }
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
}

?>