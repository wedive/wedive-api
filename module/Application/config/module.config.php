<?php
use Strapieno\Utils\InputFilter\ArrayInput;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;


return [
    'imgman-apigility' => [
        'imgman-connected' => [
            'Strapieno\PlaceGallery\Api\V1\Rest\ConnectedResource' => [
                'resource_class' => 'Application\ImgManConnectedResource'
            ],
        ],
    ],

    'input_filters' => [
        'abstract_factories' => [
            'Strapieno\Utils\InputFilter\InputFilterAbstractServiceFactory',
        ],
        'invokables' => [
            InputFilter::class => InputFilter::class,
            ArrayInput::class =>  ArrayInput::class,
            Input::class => Input::class
        ]
    ],
    'view_manager'          => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ]
];
