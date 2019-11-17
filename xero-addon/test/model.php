<?php

require_once '../vendor/autoload.php';
require_once '../includes.php';
require_once '../models/Accounts.php';

$data = array(
    array(
        "name" => "Jhon Freitez",
        "address" => "Tocancipa",
        "age" => 29,
        "AccountID" => "asasasas"
    ),
    array(
        "name" => "Jhon 3",
        "address" => "Tocancipa 3",
        "age" => 32,
        "AccountID" => "asasasas 3"
    )
    );

$acc = new Accounts();
$acc->set($data);

$acc->save();

?>