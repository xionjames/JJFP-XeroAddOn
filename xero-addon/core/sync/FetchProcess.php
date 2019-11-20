<?php
/**
 * Principal class for fetch data from Xero and save in MongoDB
 */

namespace JJFP\Sync;

use JJFP\Xero\Retriever;
use JJFP\Db\Model;
use JJFP\Db\Models\Processes;
use JJFP\Exception\ProcessException;

abstract class FetchProcess {
    protected $relationships = array();
    private $proc;

    /**
     * Just to obligate developers to initialize the $relationship array
     */
    abstract function initialize();

    public function process() {
        $this->initialize();
        
        try {
            // start process
            $this->proc = new Processes();
            $this->proc->start(Processes::OPERATION_FETCH);

            // retrieve and save
            if (sizeof($this->relationships) == 0) {
                $this->proc->finish('Nothing selected to sync');
            }

            foreach ($this->relationships as $xero => $mongo) {
                $this->retrieveAndSave($xero, $mongo);
            }

             // finish OK 
            $this->proc->finish();

            return true;
        } catch (ProcessException $e) {
            // finish FAILED
            $this->proc->finish($e->getMessage());
            
            return false;
        }
    }

    /**
     * Call retrieving data from xero and store in database
     */
    private function retrieveAndSave($api, $model) {
        // retrieve 
        $ret = new Retriever($api);

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

?>