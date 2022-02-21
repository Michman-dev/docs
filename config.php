<?php declare(strict_types=1);

use Illuminate\Support\Str;
use TightenCo\Jigsaw\PageVariable;

return [
    'production' => false,

    'baseUrl' => 'http://localhost:8000',
    'homepage' => 'introduction',

    'siteName' => 'Michman Docs',
    'siteDescription' => 'Python and Django hosting, instant automated deployment and Python servers.',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function (PageVariable $page, $path): bool
    {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },

    'isActiveParent' => function (PageVariable $page, $menuItem): bool
    {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }

        return false;
    },

    'url' => function (PageVariable $page, $path): string
    {
        return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
    },

    'fullUrl' => function(PageVariable $page, string $path): string
    {
        $path = Str::lower(trim($path));

        if (Str::startsWith($path, 'http'))
            return $page->url($path);

        return $page->baseUrl . $page->url($path);
    },
];
