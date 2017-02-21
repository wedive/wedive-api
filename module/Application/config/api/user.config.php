<?php
return [
    'UserRoleTypes' => [
        'diver',
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
            'email' => [
                'validators' => [
                    'stringlength' => [
                        'name' => 'stringlength',
                        'options' => [
                            'min' => 0,
                            'max' => 50
                        ]
                    ]
                ]
            ],
            'user_name' => [
                'validators' => [
                    'stringlength' => [
                        'name' => 'stringlength',
                        'options' => [
                            'min' => 0,
                            'max' => 30
                        ]
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
            'password' => [
                'validators' => [
                    'stringlength' => [
                        'name' => 'stringlength',
                        'break_chain_on_failure' => true,
                        'options' => [
                            'min' => 8,
                            'max' => 12
                        ]
                    ],
                    'password' => [
                        'name' => 'Strapieno\Utils\Validator\Password',
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
            'user_name' => [
                'require' => true,
                'allow_empty' => false,
                'name' => 'user_name'
            ],
            'password' => [
                'require' => true,
                'allow_empty' => false,
                'name' => 'password'
            ],
        ]
    ]
];