<?php
return [
    // TODO move it in model project
    'RolesTypes' => [
        'guest',
        'god'
    ],
    'matryoshka-objects' => [
        'User' => [
            'type' => 'Application\User\Entity\DiverEntity',
            'active_record_criteria' => 'Strapieno\Model\Criteria\NotIsolatedActiveRecordCriteria',
            'hydrator' => 'UserApiHydrator'
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            'Application\Entity\UserEntity' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api-rest/user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'UserApiHydrator',
            ],
        ],
    ],

    'zf-content-validation' => [
        'Strapieno\User\Api\V1\Rest\Controller' => [
            'POST' => 'Application\User\Api\InputFilter\PostInputFilter',
        ]
    ],

    'strapieno-array-validators' => [
        'UserTypesValidator' => [
            'name_key_array_config' => 'UserTypes'
        ]
    ],
    'UserTypes' => [
        'diver',
        'diverOwner'
    ],
    'strapieno_input_filter_specs' => [
        'Strapieno\User\Model\InputFilter\DefaultInputFilter' => [
            'type' => [
                'name' => 'type',
                'require' => false,
                'allow_empty' => true,
                'filters' => [
                    'stringtrim' => [
                        'name' => 'stringtrim',
                    ]
                ],
                'validators' => [
                    'UserTypesValidator' => [
                        'name' => 'UserTypesValidator',
                        'break_chain_on_failure' => true
                    ]
                ]
            ],
            'comment' => [
                'name' => 'comment',
                'require' => false,
                'allow_empty' => true,
                'filters' => [
                    'stringtrim' => [
                        'name' => 'stringtrim',
                    ]
                ],
                'validators' => [
                    'stringlength' => [
                        'name' => 'stringlength',
                        'options' => [
                            'min' => 40,
                            'max' => 1000
                        ]
                    ]
                ]
            ],
        ],
        'Application\User\Api\InputFilter\PostInputFilter' => [
            'merge' => 'Strapieno\User\Model\InputFilter\DefaultInputFilter',
            'email' => [
                'require' => true,
                'allow_empty' => false,
                'name' => 'email',
                'validators' => [
                    'user-emailunique' => [
                        'name' => 'user-emailunique',
                        'break_chain_on_failure' => true
                    ]
                ]
            ],
            'type' => [
                'require' => true,
                'allow_empty' => false,
                'name' => 'type'
            ],
            'comment' => [
                'require' => true,
                'allow_empty' => false,
                'name' => 'comment'
            ],
        ]
    ]
];