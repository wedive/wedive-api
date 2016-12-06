<?php
return [
    'user_listener' => [
        'template' => 'email/registration',
        'subject' => 'Wedives - Registrazione'
    ],
    'service-listeners' => [
        'factories' => [
            'Strapieno\UserCheckIdentity\Api\V1\Listener\EmailListener' => 'Strapieno\UserCheckIdentity\Api\V1\Listener\EmailListenerFactory'
        ]
    ],
    // Register listener to User rest controller
    'attach-listeners' => [
        'Strapieno\User\Api\V1\Rest\Controller' => [
            'Strapieno\UserCheckIdentity\Api\V1\Listener\EmailListener'
        ]
    ]
];