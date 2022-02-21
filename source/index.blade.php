<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Redirecting to homepage {{ $page->fullUrl($page->homepage) }}</title>
        <meta http-equiv="refresh" content="0; URL={{ $page->fullUrl($page->homepage) }}">
        <link rel="canonical" href="{{ $page->fullUrl($page->homepage) }}">
    </head>
</html>
