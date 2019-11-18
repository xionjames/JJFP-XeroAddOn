<?php

namespace JJFP\Db\Models;

use JJFP\Db\Model;

class Vendors extends Model {

    function __construct() {
        parent::__construct();
        
        $this->key = "ContactID";
        $this->fields = array('ContactID', 'ContactNumber', 'Name', 'EmailAddress', 'ContactStatus', 'IsSupplier', 'IsCustomer', 'UpdatedDateUTC');
    }
}

?>