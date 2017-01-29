<?php

return [
    'service_manager' => [
        'invokables' => [
            'Application\DiveLog\Criteria\Mongo\DiveLogMongoCollectionCriteria' => 'Application\DiveLog\Criteria\Mongo\DiveLogMongoCollectionCriteria',
        ],
        'aliases' => [
            'Strapieno\DiveLog\Model\Criteria\DiveLogCollectionCriteria' => 'Application\DiveLog\Criteria\Mongo\DiveLogMongoCollectionCriteria',
        ]
    ],
    'aclman-assertion-manager' => [
        'invokables' => [
            'Application\DiveLog\Assertion\IsOwnAssertion' => 'Application\DiveLog\Assertion\IsOwnAssertion',
        ],
        'initializers' => [
            'Strapieno\DiveLog\Model\DiveLogModelInitializer'
        ]
    ],
    'service-listeners' => [
        'invokables' => [
            'Application\DiveLog\DiverBeforAuth' => 'Application\DiveLog\DiverBeforAuth',
        ]
    ],
    'zf-rest' => [
        'Strapieno\DiveLog\Api\V1\Rest\Controller' => [
            'collection_query_whitelist' => [
                'user_id'
            ]
        ]
    ],
    'attach-prevalidation-listeners' => [
        'Strapieno\DiveLog\Api\V1\Rest\Controller' => [
            'Application\DiveLog\DiverBeforAuth'
        ]
    ],
    'hydrators' => [
        'invokables' => [
            'Application\DiveLog\Hydrator\Mongo\DiveLogModelMongoHydrator' => 'Application\DiveLog\Hydrator\Mongo\DiveLogModelMongoHydrator',
            'Application\DiveLog\Hydrator\DiveLogHydrator' => 'Application\DiveLog\Hydrator\DiveLogHydrator'
        ],
         'aliases' => [
            'Strapieno\DiveLog\Model\Hydrator\DiveLogModelMongoHydrator'  => 'Application\DiveLog\Hydrator\Mongo\DiveLogModelMongoHydrator',
            'DiveLogApiHydrator' => 'Application\DiveLog\Hydrator\DiveLogHydrator'
        ]
    ],
    'matryoshka-objects' => [
        'DiveLog' => [
            'type' => 'Application\DiveLog\Entity\DiveLogEntity'
        ]
    ],
    'strapieno_input_filter_specs' => [
        'Strapieno\DiveLog\Api\InputFilter\PutInputFilter' => [
            'merge' => 'Strapieno\DiveLog\Api\InputFilter\PostInputFilter',
            'user_id' => [
                'require' => false,
                'allow_empty' => true
            ],
        ],
        'Strapieno\DiveLog\Api\InputFilter\PostInputFilter' => [
            'visibility' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'current' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'temperature' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'depth' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'duration_dive' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'start_point_dive' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'date_when' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'user_id' => [
                'require' => true,
                'allow_empty' => false,
            ],
            'place_reference' => [
                'require' => true,
                'allow_empty' => false
            ],
        ],
        'Strapieno\DiveLog\Model\InputFilter\DefaultInputFilter' => [
            'user_id' => [
                'require' => false,
                'allow_empty' => true,
                'name' => 'user_id',
                'filters' => [
                    'stringtrim' =>  [
                        'name' => 'stringtrim',
                    ]
                ],
                'validators' => [
                    'mongoid' => [
                        'name' => \Strapieno\Utils\Validator\Model\MongoId::class,
                        'break_chain_on_failure' => true,
                    ],
                    'divelogentityexist' => [
                        'name' => 'user-entityexist'
                    ]
                ]
            ],
            'date_when' => [
                'filters' => [
                    'tonull' =>  [
                        'name' => 'tonull',
                    ]
                ],
                'require' => false,
                'allow_empty' => true,
            ],
            'visibility' => [
                'validators' => [
                    'between' => [
                        'name' => 'between',
                        'break_chain_on_failure' => true,
                        'options' => [
                            'min' => 1,
                            'max' => 5
                        ]
                    ]
                ]
            ],
            'current' => [
                'validators' => [
                    'between' => [
                        'name' => 'between',
                        'break_chain_on_failure' => true,
                        'options' => [
                            'min' => 0,
                            'max' => 5
                        ]
                    ]
                ]
            ],
            'note' => [
                'name' => 'note',
                'validators' => [
                    'stringlength' =>  [
                        'name' => 'stringlength',
                        'break_chain_on_failure' => true,
                        'options' => [
                            'min' => 20,
                            'max' => 2000
                        ]
                    ]
                ]
            ],
            'place_reference' => [
                'require' => true,
                'allow_empty' => false,
                'name' => 'place_reference',
                'filters' => [
                    'stringtrim' =>  [
                        'name' => 'stringtrim',
                    ]
                ],
            ],
        ]
    ]
];