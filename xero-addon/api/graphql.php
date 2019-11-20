<?php
/**
 * This file contains the main API for GraphQL.
 * 
 */

namespace JJFP\Api;

require_once '../includes.php';

use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use GraphQL\Utils\BuildSchema;
use GraphQL\Utils\AST;

// Read schema
$document = AST::fromArray(require 'schema.php');
$typeConfigDecorator = function () {};
$schema = BuildSchema::build($document, $typeConfigDecorator);

// read input
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
$query = $input['query'];
$variableValues = isset($input['variables']) ? $input['variables'] : null;

// execute query
try {
    $rootValue = ['prefix' => 'You said: '];
    $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
    $output = $result->toArray();
} catch (\Exception $e) {
    $output = [
        'errors' => [
            [
                'message' => $e->getMessage()
            ]
        ]
    ];
}

// just... response
header('Content-Type: application/json');
echo json_encode($output);

?>