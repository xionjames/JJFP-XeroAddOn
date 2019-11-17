<?php

namespace JJFP\Api;

require_once '../includes.php';

use JJFP\Xero\Retriever;
use JJFP\Db\Model\Vendors;

$ret = new Retriever('Accounting\\Contact');
$data = $ret->retrieve();

if ($data == false) {
    echo "ERROR: " . $ret->getError();
}

$acc = new Vendors();
$acc->set($data);
$acc->save();

?>