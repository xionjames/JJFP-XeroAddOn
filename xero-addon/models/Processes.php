<?php

use JJFP\Db\Model;

class Processes extends Model {

    function __construct() {
        parent::__construct();
        
        $this->key = "ProcessID";
    }
}

?>