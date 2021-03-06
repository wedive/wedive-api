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
                                    'POST',
                                    'GET'
                                ]
                            ]
                        ],
                        'Strapieno\DiveLog\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'assert' => [
                                    [
                                        'name' => 'Application\DiveLog\Assertion\IsOwnAssertion',
                                    ],
                                ],
                                'privileges' => [
                                    'PUT',
                                    'GET'
                                ]
                            ]
                        ],
                        'Strapieno\Place\Api\V1\Rest\Controller::entity' => [
                            [
                                'assert' => [
                                    [
                                        'name' => 'Application\Place\Assertion\IsOwnAssertion',
                                    ],
                                    [
                                        'name' => 'Application\Place\Assertion\StateAssertion',
                                        'state' => 'validating',
                                    ],
                                ],
                                'allow' => true,
                                'privileges' => [
                                    'PUT'
                                ]
                            ]
                        ],
                        'Strapieno\Place\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        'Strapieno\PlaceGallery\Api\V1\Rest\Controller::collection' => [
                            [
                                'allow' => true,
                                'assert' => [
                                    [
                                        'name' => 'Application\Place\Assertion\IsOwnAssertion',
                                    ],
                                    [
                                        'name' => 'Application\Place\Assertion\StateAssertion',
                                        'state' => 'validating',
                                    ],
                                ],
                                'privileges' => [
                                    'POST'
                                ]
                            ]
                        ],
                        'Strapieno\PlaceGallery\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'assert' => [
                                    [
                                        'name' => 'Application\Place\Assertion\IsOwnAssertion',
                                    ],
                                    [
                                        'name' => 'Application\Place\Assertion\StateAssertion',
                                        'state' => 'validating',
                                    ],
                                ],
                                'privileges' => [
                                    'PUT',
                                    'DELETE'
                                ]
                            ]
                        ],
                        'Strapieno\PlaceCover\Api\V1\Rest\Controller::entity' => [
                            [
                                'allow' => true,
                                'assert' => [
                                    [
                                        'name' => 'Application\Place\Assertion\IsOwnAssertion',
                                    ],
                                    [
                                        'name' => 'Application\Place\Assertion\StateAssertion',
                                        'state' => 'validating',
                                    ],
                                ],
                                'privileges' => [
                                    'PUT'
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
                        // Recover password
                        'Strapieno\UserCheckIdentity\Api\V1\RpcController::validateIdentity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'POST'
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
                        // Identity
                        'Strapieno\Identity\Api\V1\RpcController::getIdentity' => [
                            [
                                'allow' => true,
                                'privileges' => [
                                    'GET'
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