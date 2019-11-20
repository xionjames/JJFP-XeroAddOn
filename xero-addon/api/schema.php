<?php
return array (
  'kind' => 'Document',
  'loc' => 
  array (
    'start' => 0,
    'end' => 682,
  ),
  'definitions' => 
  array (
    0 => 
    array (
      'kind' => 'SchemaDefinition',
      'loc' => 
      array (
        'start' => 0,
        'end' => 27,
      ),
      'directives' => 
      array (
      ),
      'operationTypes' => 
      array (
        0 => 
        array (
          'kind' => 'OperationTypeDefinition',
          'loc' => 
          array (
            'start' => 13,
            'end' => 25,
          ),
          'operation' => 'query',
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 20,
              'end' => 25,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 20,
                'end' => 25,
              ),
              'value' => 'Query',
            ),
          ),
        ),
      ),
    ),
    1 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 29,
        'end' => 143,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 34,
          'end' => 39,
        ),
        'value' => 'Query',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 46,
            'end' => 63,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 46,
              'end' => 54,
            ),
            'value' => 'accounts',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 56,
              'end' => 63,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 56,
                'end' => 63,
              ),
              'value' => 'Account',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 68,
            'end' => 83,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 68,
              'end' => 75,
            ),
            'value' => 'vendors',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 77,
              'end' => 83,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 77,
                'end' => 83,
              ),
              'value' => 'Vendor',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 88,
            'end' => 106,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 88,
              'end' => 97,
            ),
            'value' => 'processes',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 99,
              'end' => 106,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 99,
                'end' => 106,
              ),
              'value' => 'Process',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 111,
            'end' => 141,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 111,
              'end' => 114,
            ),
            'value' => 'log',
          ),
          'arguments' => 
          array (
            0 => 
            array (
              'kind' => 'InputValueDefinition',
              'loc' => 
              array (
                'start' => 115,
                'end' => 132,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 115,
                  'end' => 124,
                ),
                'value' => 'processId',
              ),
              'type' => 
              array (
                'kind' => 'NamedType',
                'loc' => 
                array (
                  'start' => 126,
                  'end' => 132,
                ),
                'name' => 
                array (
                  'kind' => 'Name',
                  'loc' => 
                  array (
                    'start' => 126,
                    'end' => 132,
                  ),
                  'value' => 'String',
                ),
              ),
              'directives' => 
              array (
              ),
            ),
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 136,
              'end' => 141,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 137,
                'end' => 140,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 137,
                  'end' => 140,
                ),
                'value' => 'Log',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    2 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 145,
        'end' => 287,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 150,
          'end' => 157,
        ),
        'value' => 'Account',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 164,
            'end' => 176,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 164,
              'end' => 168,
            ),
            'value' => 'xero',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 170,
              'end' => 176,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 170,
                'end' => 176,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 181,
            'end' => 193,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 181,
              'end' => 185,
            ),
            'value' => 'code',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 187,
              'end' => 193,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 187,
                'end' => 193,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 198,
            'end' => 210,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 198,
              'end' => 202,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 204,
              'end' => 210,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 204,
                'end' => 210,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 215,
            'end' => 227,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 215,
              'end' => 219,
            ),
            'value' => 'type',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 221,
              'end' => 227,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 221,
                'end' => 227,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 232,
            'end' => 245,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 232,
              'end' => 237,
            ),
            'value' => 'class',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 239,
              'end' => 245,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 239,
                'end' => 245,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 250,
            'end' => 264,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 250,
              'end' => 256,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 258,
              'end' => 264,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 258,
                'end' => 264,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 269,
            'end' => 285,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 269,
              'end' => 277,
            ),
            'value' => 'updateAt',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 279,
              'end' => 285,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 279,
                'end' => 285,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    3 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 289,
        'end' => 450,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 294,
          'end' => 300,
        ),
        'value' => 'Vendor',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 307,
            'end' => 319,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 307,
              'end' => 311,
            ),
            'value' => 'xero',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 313,
              'end' => 319,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 313,
                'end' => 319,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 325,
            'end' => 337,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 325,
              'end' => 329,
            ),
            'value' => 'name',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 331,
              'end' => 337,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 331,
                'end' => 337,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 343,
            'end' => 356,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 343,
              'end' => 348,
            ),
            'value' => 'email',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 350,
              'end' => 356,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 350,
                'end' => 356,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 362,
            'end' => 376,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 362,
              'end' => 368,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 370,
              'end' => 376,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 370,
                'end' => 376,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 382,
            'end' => 398,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 382,
              'end' => 390,
            ),
            'value' => 'updateAt',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 392,
              'end' => 398,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 392,
                'end' => 398,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 404,
            'end' => 423,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 404,
              'end' => 414,
            ),
            'value' => 'isSupplier',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 416,
              'end' => 423,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 416,
                'end' => 423,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        6 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 429,
            'end' => 448,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 429,
              'end' => 439,
            ),
            'value' => 'isCustomer',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 441,
              'end' => 448,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 441,
                'end' => 448,
              ),
              'value' => 'Boolean',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    4 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 452,
        'end' => 588,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 457,
          'end' => 464,
        ),
        'value' => 'Process',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 471,
            'end' => 481,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 471,
              'end' => 473,
            ),
            'value' => 'id',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 475,
              'end' => 481,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 475,
                'end' => 481,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 487,
            'end' => 504,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 487,
              'end' => 496,
            ),
            'value' => 'operation',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 498,
              'end' => 504,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 498,
                'end' => 504,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 510,
            'end' => 524,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 510,
              'end' => 516,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 518,
              'end' => 524,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 518,
                'end' => 524,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 530,
            'end' => 547,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 530,
              'end' => 539,
            ),
            'value' => 'startedAt',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 541,
              'end' => 547,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 541,
                'end' => 547,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        4 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 553,
            'end' => 570,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 553,
              'end' => 562,
            ),
            'value' => 'updatedAt',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 564,
              'end' => 570,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 564,
                'end' => 570,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        5 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 576,
            'end' => 586,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 576,
              'end' => 579,
            ),
            'value' => 'log',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'ListType',
            'loc' => 
            array (
              'start' => 581,
              'end' => 586,
            ),
            'type' => 
            array (
              'kind' => 'NamedType',
              'loc' => 
              array (
                'start' => 582,
                'end' => 585,
              ),
              'name' => 
              array (
                'kind' => 'Name',
                'loc' => 
                array (
                  'start' => 582,
                  'end' => 585,
                ),
                'value' => 'Log',
              ),
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
    5 => 
    array (
      'kind' => 'ObjectTypeDefinition',
      'loc' => 
      array (
        'start' => 590,
        'end' => 680,
      ),
      'name' => 
      array (
        'kind' => 'Name',
        'loc' => 
        array (
          'start' => 595,
          'end' => 598,
        ),
        'value' => 'Log',
      ),
      'interfaces' => 
      array (
      ),
      'directives' => 
      array (
      ),
      'fields' => 
      array (
        0 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 605,
            'end' => 619,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 605,
              'end' => 611,
            ),
            'value' => 'action',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 613,
              'end' => 619,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 613,
                'end' => 619,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        1 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 625,
            'end' => 639,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 625,
              'end' => 631,
            ),
            'value' => 'status',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 633,
              'end' => 639,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 633,
                'end' => 639,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        2 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 645,
            'end' => 657,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 645,
              'end' => 649,
            ),
            'value' => 'date',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 651,
              'end' => 657,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 651,
                'end' => 657,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
        3 => 
        array (
          'kind' => 'FieldDefinition',
          'loc' => 
          array (
            'start' => 663,
            'end' => 678,
          ),
          'name' => 
          array (
            'kind' => 'Name',
            'loc' => 
            array (
              'start' => 663,
              'end' => 670,
            ),
            'value' => 'records',
          ),
          'arguments' => 
          array (
          ),
          'type' => 
          array (
            'kind' => 'NamedType',
            'loc' => 
            array (
              'start' => 672,
              'end' => 678,
            ),
            'name' => 
            array (
              'kind' => 'Name',
              'loc' => 
              array (
                'start' => 672,
                'end' => 678,
              ),
              'value' => 'String',
            ),
          ),
          'directives' => 
          array (
          ),
        ),
      ),
    ),
  ),
);
