<?php

/**
 * This file just parse the GraphQL schema into PHP style.
 * Please, use from command-line.
 */

require_once '../includes.php';

use GraphQL\Language\Parser;
use GraphQL\Utils\BuildSchema;
use GraphQL\Utils\AST;

$output = 'schema.php';

$document = Parser::parse(file_get_contents('./schema.graphql'));
file_put_contents($output, "<?php\nreturn " . var_export(AST::toArray($document), true) . ";\n");


?>