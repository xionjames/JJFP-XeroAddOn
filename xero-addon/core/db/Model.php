<?php

namespace JJFP\Db;

use JJFP\Common\Constants;
use JJFP\Common\MyLogger;
use JJFP\Config\Config;

class Model {
    private $data = array();
    private $collection;
    private $cfg;
    protected $key;
    private $logger;

    public function __construct() {
        $this->collection = strtolower(get_class($this));

        $this->cfg = Config::getInstance();
        $this->cfg->load();

        $this->logger = MyLogger::getLogger();
    }

    public function set($data) {
        $this->data = $data;
    }

    public function save() {
        // connect
        $this->logger->info("Connecting to database...");

        $user = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_USER);
        $pass = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_PASSWORD);
        $db = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_DATABASE);
        $host = $this->cfg->get(Constants::INI_MONGO, Constants::INI_MONGO_HOST);

        $uri = "mongodb://$user:$pass@$host/$db?ssl=false";
        
        try {
            $mongoClient = new \MongoDB\Client($uri);

            $coll = $mongoClient->{$db}->{$this->collection};

            // save!
            $this->logger->info("Inserting/Updating " . sizeof($this->data) . " records...");

            $modifieds = array();
            foreach ($this->data as $entry) {
                echo "key: " . $this->key;
                $result = $coll->updateOne( 
                    [ 'xero_id' => $entry[$this->key] ],
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
}

?>