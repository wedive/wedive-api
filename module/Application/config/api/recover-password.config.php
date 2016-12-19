<?php
return [
    'email-setting' => [
        'recover-password-template' => 'email/recover-password',
        'recover-password-subject' => 'Wedives - Recupera password'
    ],
    'matryoshka-models' => [
        'Strapieno\User\Model\UserModelService' => [
            'listeners' => [
                'Strapieno\UserRecoverPassword\Api\V1\Listener\EmailListener',
            ]
        ]
    ],
    'matryoshka' => [
        'listener_manager' => [
            'factories' => [
                'Strapieno\UserRecoverPassword\Api\V1\Listener\EmailListener' => 'Strapieno\UserRecoverPassword\Api\V1\Listener\EmailListenerFactory'
            ]
        ]
    ],
    'reset-password-inputfilter' => 'user',
    'strapieno_input_filter_specs' => [
        'Strapieno\UserRecoverPassword\Api\V1\InputFilter\GenerateTokenInputFilter' => [
            'identity' => [
                'filters' => [
                    'stringtrim' => [
                        'name' => 'stringtrim',
                    ]
                ],
                'validators' => [
                    'emailaddress' => [
                        'name' => 'emailaddress',
                        'break_chain_on_failure' => true
                    ],
                    'user-emailexist' => [
                        'name' => 'user-emailexist',
                        'break_chain_on_failure' => true
                    ]
                ]
            ]
        ]
    ]
];