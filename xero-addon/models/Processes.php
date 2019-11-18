<?php

namespace JJFP\Db\Model;

use JJFP\Db\Model;

class Processes extends Model {

    protected $processID;

    const STATE_STARTED   = 'STARTED';
    const STATE_FAILED    = 'FAILED';
    const STATE_COMPLETED = 'COMPLETED';
    const STATE_OK        = 'OK';
    const STATE_ERROR     = 'ERROR';

    const OPERATION_FETCH = 'FETCH';
    const OPERATION_PUSH  = 'PUSH';


    function __construct() {
        parent::__construct();
        
        $this->key = "ProcessID";
    }

    /**
     * Insert the process record on mongo
     */
    public function start() {
        $result = $this->exec(
            Model::INSERT,
            array(
                'Operation' => Processes::OPERATION_FETCH,
                'State'     => Processes::STATE_STARTED,
                'StartedAt' => $this->getUTCDate(),
                'Log'       => array(
                    array(
                        'Action' => 'Fecth operation started',
                        'State'  => Processes::STATE_OK,
                        'Date'   => $this->getUTCDate()
                    )
                )
            )
        );

        if ($result == null) {
            $this->logger->error('Problem inserting process data!');
            return false;
        }

        $this->processID = $result;

        return true;
    }

    /**
     * Update the process record on mongo
     */
    public function update($action, $state) {
        $result = $this->exec(
            Model::UPDATE,
            array(
                '_id' => $this->processID
            ),
            array(
                '$set' => array(
                    'UpdatedAt' => $this->getUTCDate()
                ),
                '$push' => array(
                    'Log' => array(
                        'Action' => $action,
                        'State'  => $state,
                        'Date'   => $this->getUTCDate()
                    )
                )
            )
        );

        if ($result == null || $result === 0) {
            $this->logger->error('Problem updating process data!');
            return false;
        }

        return true;
    }

    /**
     * Update (finish) the process record on mongo
     */
    public function finish($error = null) {
        $result = $this->exec(
            Model::UPDATE,
            array(
                '_id' => $this->processID
            ),
            array(
                '$set' => array(
                    'UpdatedAt' => $this->getUTCDate(),
                    'State'     => $error == null ? Processes::STATE_COMPLETED : Processes::STATE_FAILED
                ),
                '$push' => array(
                    'Log' => array(
                        'Action' => 'Fetch operation ' . ($error == null ? 'finished' : 'failed'),
                        'State'  => $error == null ? Processes::STATE_OK : Processes::STATE_ERROR,
                        'Date'   => $this->getUTCDate()
                    )
                )
            )
        );

        if ($result == null || $result === 0) {
            $this->logger->error('Problem updating process data!');
            return false;
        }

        return true;
    }
}

?>