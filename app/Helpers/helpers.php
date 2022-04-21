<?php declare(strict_types=1);

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

if (! function_exists('now')) {
    function now(): CarbonInterface
    {
        return CarbonImmutable::now();
    }
}

if (! function_exists('slashedUrl')) {
    /** Ensure the URL has a slash at the end. */
    function slashedUrl(string $url): string
    {
        return rtrim($url, '/') . '/';
    }
}
