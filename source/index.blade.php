---
sitemap: false
---

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0; URL={{ $page->url($page->homepage) }}">
        <link rel="canonical" href="{{ $page->fullUrl($page->homepage) }}">

        <title>{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}</title>
        @include('_partials.socials')

    </head>
</html>
