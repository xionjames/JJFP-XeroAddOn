<?php

namespace JJFP\Api;

require_once '../includes.php';

use JJFP\Xero\Retriever;
use JJFP\Db\Model;
use JJFP\Db\Models\Processes;
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
        $this->proc->update('Retrieving ' . $api . 's', Processes::STATE_OK, array( 'Records' => $ret->getTotalRecords() ));

        if ($ret->getTotalRecords() == 0) {
            // Nothing to save
            return;
        }

        // save 
        $class = "JJFP\\Db\\Models\\$model";
        $mod = new $class();
        $mod->set($data);
        if ($mod->save() == true) {
            $this->proc->update('Saving ' . $model . 's', Processes::STATE_OK, array( 'Records' => $mod->getResults() ));
        } else {
            $this->proc->update('Saving ' . $model . 's', Processes::STATE_ERROR);

            throw new ProcessException("Error saving $model data", 3);

        }
    }
}


$t = new Tester();
$t->process();

/*
$ac = new Accounts();
$result = $ac->exec(Model::FIND, [], [
    'sort' => ['Name' => 1]
]);

print_r($result);
*/
?>