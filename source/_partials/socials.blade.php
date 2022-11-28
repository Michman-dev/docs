{{-- Twitter-specific Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="{{ $page->imageFullUrl('twitter-og.png', true) }}">
<meta name="twitter:image:alt" content="{{ $page->siteName }}">
<meta name="twitter:site" content="{{ $page->twitterAccount }}">
<meta name="twitter:creator" content="{{ $page->twitterAccount }}">
<meta name="twitter:title" content="{{ $page->getTitle() }}">
<meta name="twitter:description" content="{{ $page->description ?? $page->siteDescription }}">
{{--<meta name="twitter:label2" value="API">--}}
{{--<meta name="twitter:data2" value="https://docs.michman.dev/api">--}}

{{-- Generic Social Tags --}}
<meta property="og:site_name" content="{{ $page->siteName }}">
<meta property="og:title" content="{{ $page->getTitle() }}">
<meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
<meta property="og:url" content="{{ $page->getUrl() }}">
<meta property="og:image" content="{{ $page->imageFullUrl('twitter-og.png', true) }}">
<meta property="og:image:alt" content="{{ $page->siteName }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">

{{-- Facebook Tags --}}
{{--<meta property="fb:app_id" content="1234567890">--}}

{{-- Generic Metas --}}
<meta itemprop="name" content="{{ $page->siteName }}">
<meta itemprop="description" content="{{ $page->description ?? $page->siteDescription }}">
<meta itemprop="image" content="{{ $page->imageFullUrl('twitter-og.png', true) }}">
