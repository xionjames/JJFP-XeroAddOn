<?php
/**
 * This file contains the main API for GraphQL.
 * Please, run using command line:
 * 
 *    php -S localhost:8080 graphql.php
 * 
 */

namespace JJFP\Api;

require_once 'types.php';

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Error\FormattedError;
use GraphQL\Error\Debug;


/* Allow CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Read schema
$schema = new Schema([
    'query' => $queryType
]);

// Parse incoming query and variables
if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    $raw = file_get_contents('php://input') ?: '';
    $data = json_decode($raw, true) ?: [];
} else {
    $data = $_REQUEST;
}

$data += ['query' => null, 'variables' => null];


// execute query
$debug = Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE;;

try {
    $result = GraphQL::executeQuery($schema, $data['query'], null, null, $data['variables']);
    $output = $result->toArray($debug);
    $httpStatus = 200;
} catch (\Exception $e) {
    $httpStatus = 500;
    $output['errors'] = [
        'error' => FormattedError::createFromException($e, $debug)
    ];
}

// just... response
header('Content-Type: application/json', true, $httpStatus);
echo json_encode($output);

?>