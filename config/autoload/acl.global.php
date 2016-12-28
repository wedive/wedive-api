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
                    ],
                    'resources' => [
                        'Strapieno\User\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => false,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        'Strapieno\DiveLog\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ]
                    ]

                ],
                'guest' => [
                    'resources' => [
                        // User
                        'Strapieno\User\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        // TODO remove add only to view the <img> tag on client
                        'Strapieno\UserAvatar\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
                                ]
                            ]
                        ],
                        // Recover password
                        'Strapieno\UserRecoverPassword\Api\V1\RecoverRpcController::generateToken' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        // Reset password
                        'Strapieno\UserRecoverPassword\Api\V1\ResetRpcController::resetPassword' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        // Place
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
                        // Place cover
                        'Strapieno\PlaceCover\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
                                ]
                            ]
                        ],
                        // Place gallery
                        'Strapieno\PlaceGallery\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
                                ]
                            ]
                        ],
                        // Oauth
                        'ZF\OAuth2\Controller\Auth::token' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];