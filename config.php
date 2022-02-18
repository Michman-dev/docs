<?php declare(strict_types=1);

use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://localhost',
    'production' => false,

    'siteName' => 'Michman Docs',
    'siteDescription' => 'Python and Django hosting, instant automated deployment and Python servers.',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path): bool {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },

    'isActiveParent' => function ($page, $menuItem): bool {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }

        return false;
    },

    'url' => function ($page, $path): string {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },
];
