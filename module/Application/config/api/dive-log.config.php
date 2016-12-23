<?php
return [
    'strapieno_input_filter_specs' => [
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
        ],

        'Strapieno\DiveLog\Model\InputFilter\DefaultInputFilter' => [
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
                            'min' => 1,
                            'max' => 5
                        ]
                    ]
                ]
            ],
            'note' => [
                'require' => true,
                'allow_empty' => false,
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
        ]
    ]
];