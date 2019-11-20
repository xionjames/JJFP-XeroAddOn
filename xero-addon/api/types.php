<?php
/**
 * Provides types.
 */

namespace JJFP\Api;

require_once '../process/MainProcess.php';

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use JJFP\Db\Model;
use JJFP\Db\Models\Accounts;
use JJFP\Db\Models\Vendors;
use JJFP\Db\Models\Processes;
use JJFP\Sync\Process\MainProcess;
use MongoDB\BSON\ObjectId;

// Types for every object
$accountType = new ObjectType([
    'name' => 'Accounts',
    'fields' => [
        'xero_id' => [
            'type' => Type::string()
        ],
        'Code' => [
            'type' => Type::string()
        ],
        'Name' => [
            'type' => Type::string()
        ],
        'Type' => [
            'type' => Type::string()
        ],
        'Class' => [
            'type' => Type::string()
        ],
        'Status' => [
            'type' => Type::string()
        ],
        'SavedAt' => [
            'type' => Type::string()
        ]
    ]
]);

$vendorType = new ObjectType([
    'name' => 'Vendors',
    'fields' => [
        'xero_id' => [
            'type' => Type::string()
        ],
        'Name' => [
            'type' => Type::string()
        ],
        'EmailAddress' => [
            'type' => Type::string()
        ],
        'ContactStatus' => [
            'type' => Type::string()
        ],
        'IsCustomer' => [
            'type' => Type::string()
        ],
        'IsSupplier' => [
            'type' => Type::string()
        ],
        'SavedAt' => [
            'type' => Type::string()
        ]
    ]
]);

$processType = new ObjectType([
    'name' => 'Processes',
    'fields' => [
        '_id' => [
            'type' => Type::string()
        ],
        'Operation' => [
            'type' => Type::string()
        ],
        'State' => [
            'type' => Type::string()
        ],
        'StartedAt' => [
            'type' => Type::string()
        ],
        'UpdatedAt' => [
            'type' => Type::string()
        ]
    ]
]);

$logType = new ObjectType([
    'name' => 'Log',
    'fields' => [
        'Action' => [
            'type' => Type::string()
        ],
        'State' => [
            'type' => Type::string()
        ],
        'Date' => [
            'type' => Type::string()
        ],
        'Records' => [
            'type' => Type::string()
        ]
    ]
]);

$syncType = new ObjectType([
    'name' => 'SyncProcess',
    'fields' => [
        'result' => [
            'type' => Type::string()
        ]
    ]
]);

// --- Query Type

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'accounts' => [
            'type' => Type::listOf($accountType),
            'resolve' => function() {
                return (new Accounts())->exec(Model::FIND, [], ['sort' => [ 'Name' => 1 ]]);
            }
        ],
        'vendors' => [
            'type' => Type::listOf($vendorType),
            'resolve' => function() {
                return (new Vendors())->exec(Model::FIND, [], ['sort' => [ 'Name' => 1 ]]);
            }
        ],
        'processes' => [
            'type' => Type::listOf($processType),
            'resolve' => function() {
                return (new Processes())->exec(Model::FIND);
            }
        ],
        'log' => [
            'type' => Type::listOf($logType),
            'args' => [
                'processId' => Type::nonNull(Type::string()),
            ],
            'resolve' => function($root, $args) {
                $obj = new ObjectId($args['processId']);
                $result = (new Processes())->exec(Model::FIND_ONE, ['_id' => $obj]);

                $result = $result['Log'];
                // transform records
                foreach ($result as $k => $r) {
                    if (isset($r->Records->inserted)) {
                        $i = $r->Records->inserted;
                        $a = $r->Records->matched;
                        $m = $r->Records->modified;
                        $r->Records = "Inserted: $i, Matched: $a, Modified: $m";
                    }
                }
                
                return $result;
            }
        ],
        'sync' => [
            'type' => $syncType,
            'resolve' => function($root, $args) {
                $mp = new MainProcess();
                return [
                    'result' => $mp->process() ? "SUCCESS" : "FAIL"
                ];
            }
        ]
    ]
]);


 ?>