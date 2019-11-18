<?php

namespace JJFP\Api;

require_once '../includes.php';

use JJFP\Xero\Retriever;
use JJFP\Db\Model\Vendors;
use JJFP\Db\Model\Accounts;
use JJFP\Db\Model\Processes;
use JJFP\Exception\ProcessException;

class Tester {
    private $proc;

    public function process() {
        // start process
        $this->proc = new Processes();
        $this->proc->start();

        // retrieve and save
        try {
            $this->retrieveAndSave('Contact', 'Vendors');
            $this->retrieveAndSave('Account', 'Accounts');
        } catch (ProcessException $e) {
            // finish FAILED
            $this->proc->finish($e->getMessage());
        }

        // finish OK 
        $this->proc->finish();
    }

    /**
     * Call retrieving data from xero and store in database
     */
    private function retrieveAndSave($api, $model) {
        // retrieve 
        $ret = new Retriever("Accounting\\$api");

        $data = $ret->retrieve();
        if ($data == false) {
            $this->proc->update('Retrieving ' . $api . 's', Processes::STATE_ERROR);
            
            throw new ProcessException("Error retrieving $api data", 2);
        }
        $this->proc->update('Retrieving ' . $api . 's', Processes::STATE_OK);

        // save 
        $acc = $model == 'Vendors' ? new Vendors() : new Accounts();
        $acc->set($data);
        if ($acc->save() == true) {
            $this->proc->update('Saving ' . $model . 's', Processes::STATE_OK);
        } else {
            $this->proc->update('Saving ' . $model . 's', Processes::STATE_ERROR);

            throw new ProcessException("Error saving $model data", 3);

        }
    }
}


$t = new Tester();
$t->process();


?>