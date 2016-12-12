<?php
return [
    'email-setting' => [
        'check-identity-template' => 'email/registration',
        'check-identity-subject' => 'Wedives - Registrazione'
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