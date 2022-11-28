<?php declare(strict_types=1);

use Illuminate\Support\Str;
use TightenCo\Jigsaw\PageVariable;

return [
    'production' => false,

    'baseUrl' => 'http://localhost:8000',
    'homepage' => 'introduction',

    'imagesPath' => '/assets/images/',

    'siteName' => 'Michman Docs',
    'siteDescription' => 'No-hassle Python and Django instant automated deployment, hosting and Python servers.',

    // Algolia DocSearch credentials
    'docsearchApiKey' => '',
    'docsearchIndexName' => '',

    // Navigation menu
    'navigation' => require_once('navigation.php'),

    /*
     * Helpers
     */
    'getTitle' => function (PageVariable $page): string
    {
        return ($page->title ? $page->title . ' | ' : '') . $page->siteName;
    },
    
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

    'image' => function(PageVariable $page, string $path): string
    {
        return $page->imagesPath . $path;
    },

    'imageFullUrl' => function(PageVariable $page, string $path, bool $version = false): string
    {
        $url = $page->fullUrl($page->image($path));

        if ($version)
            $url .= '?id=' . rand(1000000000, getrandmax());

        return $url;
    },
];
