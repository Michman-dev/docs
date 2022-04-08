<?php

use App\Service\CommonMarkParser;
use Illuminate\Support\Str;
use samdark\sitemap\Sitemap;
use TightenCo\Jigsaw\Jigsaw;
use TightenCo\Jigsaw\PageVariable;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

$container->singleton('markdownParser', function ($c) {
    return new CommonMarkParser(require('markdown.php'));
});

/**
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

/*
 * Generate custom sitemap.xml file
 */
$events->afterBuild(function (Jigsaw $jigsaw) {

    $baseUrl = $jigsaw->getConfig('baseUrl');

    $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

    $pages = $jigsaw->getPages()
        ->reject(function (PageVariable $page, string $path) {
            // Reject pages explicitly removed from sitemap
            if (($page->sitemap ?? true) === false)
                return true;

            $exclude = [
                '/assets/*',
                '/*.ico',
                '/*.png',
                '/*.svg',
                '/*.xml',
                '/*.txt',
                '/404.html',
                '/site.webmanifest',
            ];

            return Str::is($exclude, $path);
        });

    $pages->each(function (PageVariable $page, string $path) use ($baseUrl, $sitemap) {
        $sitemap->addItem(
            rtrim($baseUrl, '/') . ($page->sitemap ?? $path),
            $page->getModifiedTime(),
            Sitemap::DAILY,
        );
    });

    $sitemap->write();

});
