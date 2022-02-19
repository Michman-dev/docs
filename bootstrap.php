<?php

use App\Listeners\GenerateSitemap;
use App\Service\CommonMarkParser;
use TightenCo\Jigsaw\Jigsaw;
use League\CommonMark\GithubFlavoredMarkdownConverter;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

$container->singleton('markdownParser', function ($c) {
    return new CommonMarkParser(new GithubFlavoredMarkdownConverter());
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

$events->afterBuild(GenerateSitemap::class);

