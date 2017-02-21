<?php
return [
    'service_manager' => [
        'factories' => [
            'Strapieno\Auth\Model\OAuth2\StorageAdapter' => 'Application\OAuth\Adapter\MongoAdapterFactory',
        ],
    ],

];