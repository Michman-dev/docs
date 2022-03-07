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

    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Customizing Your Site' => 'docs/customizing-your-site',
            'Navigation' => 'docs/navigation',
            'Algolia DocSearch' => 'docs/algolia-docsearch',
            'Custom 404 Page' => 'docs/custom-404-page',
        ],
    ],

    'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
];
