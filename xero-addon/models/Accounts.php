<?php

namespace JJFP\Db\Models;

use JJFP\Db\Model;

class Accounts extends Model {

    function __construct() {
        parent::__construct();

        $this->key = "AccountID";
        $this->fields = array('AccountID', 'Code', 'Name', 'Type', 'Class', 'Status', 'UpdatedDateUTC');
    }

}

?>