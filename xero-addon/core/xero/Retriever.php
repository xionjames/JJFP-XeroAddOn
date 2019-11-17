<?php

namespace JJFP\Xero;

use XeroPHP\Application\PrivateApplication;
use XeroPHP\Models\Accounting;
use JJFP\Common\Constants;
use JJFP\Common\MyLogger;
use JJFP\Config\Config;

class Retriever {
    private $entity;
    private $xero;
    private $cfg;
    private $logger;
    private $error = '';

    function __construct($ent) {
        $this->entity = $ent;

        $this->cfg = Config::getInstance();
        $this->cfg->load();

        $this->logger = MyLogger::getLogger();
    }

    private function loadConfig() {
        $this->logger->info('Loading certificate content...');
        $cert = $this->loadCertificate();

        if ($cert == null) {
            $this->logger->error('Problem loading certificate content!');
            return false;
        }
        $this->logger->debug('Certificate content loaded!');

        $config = [
            'oauth' => [
                'callback' => $this->cfg->get( Constants::INI_XERO, Constants::INI_XERO_CALLBACK ),
                'consumer_key' => $this->cfg->get( Constants::INI_XERO, Constants::INI_XERO_KEY ),
                'consumer_secret' => $this->cfg->get( Constants::INI_XERO, Constants::INI_XERO_KEY ),
                'rsa_private_key' => $cert
            ]
        ];
        
        $this->xero = new PrivateApplication($config);

        return true;
    }

    private function loadCertificate() {
        try {
            return file_get_contents('../cfg/' . $this->cfg->get( Constants::INI_XERO, Constants::INI_XERO_CERTIFICATE ));
        } catch (Exception $e) {
            $logger->error('Error loading certificate content ' . $e->getMessage());
            return null;
        }
    } 

    public function retrieve() {
        try {
            if ($this->loadConfig()) {
                $this->logger->debug('Xero config loaded!');

                $data = $this->xero->load($this->entity)->execute();
                
                $this->logger->info('Xero data retrieved!');

                $returnData = array();
                foreach ($data as $entry) {
                    $entry = $entry->toStringArray();
                    //print_r($entry);

                    array_push($returnData, $entry);
                }

                $this->logger->debug('Received data count: ' . sizeof($returnData));

                return $returnData;
            } else {
                $this->setError('Cannot load the Xero configuration');
            }
        } catch (\XeroPHP\Remote\Exception\UnauthorizedException $e1) {
            $this->setError('Unauthorized! Please, check key and secret on app.ini file');
        } catch (\XeroPHP\Remote\Exception\RateLimitExceededException $e2) {
            $this->setError('Rate Limit Exceeded! You have to wait until next attempt');
        } catch (\XeroPHP\Remote\Exception\InternalErrorException $e3) {
            $this->setError('Houston, we have a problem with xero API!');
        } catch (Exception $e4) {
            $this->setError('Error retrieving data: ' . $e4->getMessage());
        }

        return false;
    }

    private function setError($msg) {
        $this->error = $this->error . "\n$msg";
        $this->logger->error($msg);
    }

    public function getError() {
        return $this->error;
    }
}

?>