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
];