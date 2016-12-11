<?php
return [
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