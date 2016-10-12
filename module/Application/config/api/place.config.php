<?php
return [
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
    'zf-content-validation' => [
        'Strapieno\Place\Api\V1\Rest\Controller'  => [
            'POST' => 'Application\Place\Api\InputFilter\PostInputFilter'
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
            "description" => [
                'name' => 'description',
                'require' => true,
                'allow_empty' => false
            ],
            'max_depth' => [
                'name' => 'max_depth',
                'require' => true,
                'allow_empty' => false
            ],
            "visibility" =>[
                'name' => 'visibility',
                'require' => true,
                'allow_empty' => false
            ],
            'geo_coordinate' => [
                'name' => 'geo_coordinate',
                'type' => 'Strapieno\Place\Api\InputFilter\PostGeoCoordiateInputFilter'

            ],
        ]
    ]
];