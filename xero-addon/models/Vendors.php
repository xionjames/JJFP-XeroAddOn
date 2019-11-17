<?php

use JJFP\Db\Model;

class Vendors extends Model {

    function __construct() {
        parent::__construct();
        
        $this->key = "ContactID";
    }
}

?>