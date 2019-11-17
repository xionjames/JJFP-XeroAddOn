<?php

require_once '../vendor/autoload.php';

$uri="mongodb://xero:xero123456@localhost/xero_addon?ssl=false";

$client=new MongoDB\Client($uri);

$db = 'xero_addon';
$coll = 'accounts';

$collection = $client->{$db}->{$coll};

//$result = $collection->insertOne( [ 'item' => 'producto1', 'cantidad' => '200' ] );

//echo "Inserted with Object ID '{$result->getInsertedId()}'";

$result = $collection->find()->toArray();

foreach ($result as $entry) {
    print_r( $entry );
}

?>