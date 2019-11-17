<?php

use JJFP\Db\Model;

class Accounts extends Model {

    function __construct() {
        parent::__construct();
        
        $this->key = "AccountID";
    }
}

?>