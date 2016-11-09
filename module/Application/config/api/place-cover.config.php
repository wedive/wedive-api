<?php
return [
    'imgman_services' => [
        'ImgMan\Service\PlaceCover' => [
            'renditions' => [
                'icon' => [
                    'fitOut' => [
                        'width' => 36,
                        'height' => 36
                    ],
                    'format' => [
                        'format' => 'jpeg'
                    ],
                ],
                'maxi-icon' => [
                    'fitOut' => [
                        'width' => 56,
                        'height' => 56
                    ],
                    'format' => [
                        'format' => 'jpeg'
                    ],
                ],
                'thumb' => [
                    'fitOut' => [
                        'width' => 450,
                        'height' => 450
                    ],
                    'format' => [
                        'format' => 'jpeg'
                    ],
                ]
            ]
        ]
    ],
];
