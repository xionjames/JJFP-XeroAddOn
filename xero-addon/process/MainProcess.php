<?php

namespace JJFP\Sync\Process;

require_once '../includes.php';

use JJFP\Sync\FetchProcess;

class MainProcess extends FetchProcess {

    function initialize() {
        $this->relationships = array(
            'Accounting\\Contact' => 'Vendors',
            'Accounting\\Account' => 'Accounts'
        );
    }

}
?>