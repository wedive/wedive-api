<?php
return [
    'service_manager' => [
        'invokables' => [
            'Application\Place\Criteria\Mongo\PlaceMongoCollectionCriteria' => 'Application\Place\Criteria\Mongo\PlaceMongoCollectionCriteria',
        ],
        'aliases' => [
            'Strapieno\Place\Model\Criteria\PlaceCollectionCriteria' => 'Application\Place\Criteria\Mongo\PlaceMongoCollectionCriteria',
        ]
    ],
    'aclman-assertion-manager' => [
        'invokables' => [
            'Application\Place\Assertion\IsOwnAssertion' => 'Application\Place\Assertion\IsOwnAssertion',
            'Application\Place\Assertion\StateAssertion' => 'Application\Place\Assertion\StateAssertion',
        ],
        'initializers' => [
            'placeService' => 'Strapieno\Place\Model\PlaceModelInitializer'
        ]
    ],
    'hydrators' => [
        'invokables' => [
            'Application\Place\Hydrator\Mongo\PlaceModelMongoHydrator' => 'Application\Place\Hydrator\Mongo\PlaceModelMongoHydrator',
            'Application\Place\Hydrator\PlaceHydrator' => 'Application\Place\Hydrator\PlaceHydrator'
        ],
        'aliases' => [
            'Strapieno\Place\Model\Hydrator\PlaceModelMongoHydrator' => 'Application\Place\Hydrator\Mongo\PlaceModelMongoHydrator',
            'PlaceApiHydrator' => 'Application\Place\Hydrator\PlaceHydrator'
        ]
    ],
    'matryoshka-objects' => [
        'Place' => [
            'type' => 'Application\Place\Entity\PlaceEntity'
        ]
    ],
    'zf-rest' => [
        'Strapieno\Place\Api\V1\Rest\Controller' => [
            'collection_query_whitelist' => [
                'user_id',
                'state'
            ]
        ]
    ],
    'zf-content-validation' => [
        'Strapieno\Place\Api\V1\Rest\Controller'  => [
            'input_filter' => 'Strapieno\Place\Model\InputFilter\DefaultInputFilter',
            'POST' => 'Application\Place\Api\InputFilter\PostInputFilter'
        ]
    ],
    'BadgesPlace' => [
        'cave',
        'wall',
        'fish',
        'wreck',
        'archeological',
        'psa' // protected sea area
    ],
    'TypeDive' => [
        'open',
        'advance',
        'deep',
        'expert'
    ],
    'strapieno-array-validators' => [
        'BadgesPlaceValidator' => [
            'name_key_array_config' => 'BadgesPlace'
        ],
        'TypeDiveValidator' => [
            'name_key_array_config' => 'TypeDive'
        ]
    ],
    // TODO revrite default input filter
    'strapieno_input_filter_specs' => [
        'Application\Place\Api\InputFilter\PostInputFilter' => [
            'merge' => 'Strapieno\Place\Model\InputFilter\DefaultInputFilter',
            'name' => [
                'name' => 'name',
                'require' => true,
                'allow_empty' => false
            ],
            'geo_coordinate' => [
                'name' => 'geo_coordinate',
                'type' => 'Strapieno\Place\Api\InputFilter\PostGeoCoordiateInputFilter'

            ],
            "visibility" => [
                'name' => 'visibility',
                'require' => true,
                'allow_empty' => false
            ],
            "max_depth" => [
                'name' => 'max_depth',
                'require' => true,
                'allow_empty' => false
            ],
            'current' => [
                'name' => 'current',
                'require' => true,
                'allow_empty' => false
            ],
            "description" => [
                'name' => 'description',
                'require' => true,
                'allow_empty' => false
            ],
            'start_point_dive' => [
                'require' => true,
                'allow_empty' => false,
            ],
        ],

        'Strapieno\Place\Model\InputFilter\DefaultInputFilter' => [
            "visibility" => [
                'name' => 'visibility',
                'require' => false,
                'allow_empty' => true,
                'validators' => [
                    0 => [
                        'name' => 'digits'
                    ],
                    1 => [
                        'name' => 'between',
                        'options' => [
                            'min' => 0,
                            'max' => 10
                        ]
                    ],
                ],
            ],
            "max_depth" => [
                'name' => 'max_depth',
                'require' => false,
                'allow_empty' => true,
                'validators' => [
                    0 => [
                        'name' => 'digits'
                    ],
                    1 => [
                        'name' => 'between',
                        'options' => [
                            'min' => 0,
                            'max' => 200
                        ]
                    ],
                ],
            ],
            "min_depth" => [
                'name' => 'min_depth',
                'require' => false,
                'allow_empty' => true,
                'validators' => [
                    0 => [
                        'name' => 'digits'
                    ],
                    1 => [
                        'name' => 'between',
                        'options' => [
                            'min' => 0,
                            'max' => 200
                        ]
                    ],
                ],
            ],
            'current' => [
                'name' => 'current',
                'require' => false,
                'allow_empty' => true,
                'validators' => [
                    0 => [
                        'name' => 'digits'
                    ],
                    1 => [
                        'name' => 'between',
                        'options' => [
                            'min' => 0,
                            'max' => 5
                        ]
                    ],
                ],
            ],
            "description" => [
                'name' => 'description',
                'require' => false,
                'allow_empty' => true
            ],
            'badges' => [
                'name' => 'badges',
                'require' => false,
                'type' => \Strapieno\Utils\InputFilter\ArrayInput::class,
                'validators' => [
                    0 => [
                        'name' => 'BadgesPlaceValidator'
                    ],
                ],
            ],
            'start_point_dive' => [
                'require' => false,
                'allow_empty' => true,
                'name' => 'start_point_dive',
                'filters' => [
                    'stringtrim' =>  [
                        'name' => 'stringtrim',
                    ]
                ],
                'validators' => [
                    'StartPointDiveLog' => [
                        'name' => 'StartPointDiveLogValidator'
                    ]
                ]
            ],
            'dive_type' => [
                'name' => 'dive_type',
                'require' => false,
                'type' => \Strapieno\Utils\InputFilter\ArrayInput::class,
                'validators' => [
                    0 => [
                        'name' => 'TypeDiveValidator'
                    ],
                ]
            ]
        ]
    ]
];