<?php
return [
    'aclman_storage' => [
        'Strapieno\Auth\AclMan\Storage' => [
            'roles' => [
                // Permission for all roles
                \AclMan\Storage\StorageInterface::ALL_ROLES => [
                    'resources' => [
                        \AclMan\Storage\StorageInterface::ALL_RESOURCES => [
                            [
                                'allow' => false,
                            ]
                        ]
                    ]
                ],
                'god' => [
                    'resources' => [
                        \AclMan\Storage\StorageInterface::ALL_RESOURCES => [
                            [
                                'allow' => true,
                            ]
                        ]
                    ]
                ],
                // Role diver
                'diver' => [
                    'parents' => [
                        'guest'
                    ]
                ],
                'guest' => [
                    'resources' => [
                        // Document
                        'Strapieno\User\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        'Strapieno\Place\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
                                ]
                            ]
                        ],
                        'Strapieno\Place\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
                                ]
                            ]
                        ],
                        'Strapieno\PlaceCover\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];