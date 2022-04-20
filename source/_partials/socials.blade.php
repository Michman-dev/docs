<meta property="og:site_name" content="{{ $page->siteName }}">
<meta property="og:title" content="{{ $page->title ?? $page->siteName }}">
<meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}">
<meta property="og:url" content="{{ $page->getUrl() }}">
<meta property="og:image" content="/assets/img/logo.png">
<meta property="og:image:alt" content="{{ $page->siteName }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="/assets/img/logo.png">
<meta name="twitter:image:alt" content="{{ $page->siteName }}">
{{--<meta name="twitter:site" content="@michman_dev">--}}
{{--<meta name="twitter:creator" content="@michman_dev">--}}
{{--<meta name="twitter:label1" value="Documentation">--}}
{{--<meta name="twitter:data1" value="https://docs.michman.dev">--}}
{{--<meta name="twitter:label2" value="API">--}}
{{--<meta name="twitter:data2" value="https://docs.michman.dev/api">--}}

{{--<meta property="fb:app_id" content="1234567890">--}}

<meta itemprop="name" content="{{ $page->siteName }}">
<meta itemprop="description" content="{{ $page->description ?? $page->siteDescription }}">
<meta itemprop="image" content="/assets/img/logo.png">
