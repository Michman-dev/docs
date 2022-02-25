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
            'Server Types' => 'servers/types',
            'Git Access' => 'servers/git',
            'Python' => 'servers/python',
            'Nginx Configuration' => 'servers/nginx',
            'Security' => 'servers/security',
            'Databases' => 'servers/databases',
            'Daemons' => 'servers/daemons',
        ],
    ],

    'Projects' => [
        'children' => [
            'Basics' => 'projects/basics',
            'Deployment' => 'projects/deployment',
            'Queues' => 'projects/queues',
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
