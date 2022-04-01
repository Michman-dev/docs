<?php

return [

    'Introduction' => [
        'url' => 'introduction',
    ],

    'Account' => [
        'children' => [
            'Your Account' => 'account/your-account',
            'Source Control' => 'account/vcs',
            'SSH Keys' => 'account/ssh',
            'Billing' => 'account/billing',
        ],
    ],

    'Servers' => [
        'children' => [
            'Server Providers' => 'servers/providers',
            'Creating Servers' => 'servers/create',
            'Python' => 'servers/python',
            // 'Security' => 'servers/security',
            'Databases' => 'servers/databases',
            'Daemons' => 'servers/daemons',
        ],
    ],

    'Projects' => [
        'children' => [
            'Basics' => 'projects/basics',
            'Deployment' => 'projects/deployment',
            'Queues' => 'projects/queues',
            'Nginx Configuration' => 'projects/nginx',
            'SSL' => 'projects/ssl',
        ],
    ],

];
