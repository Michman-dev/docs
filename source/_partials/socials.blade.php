<meta property="og:locale" content="en_US" />
<meta property="og:site_name" content="{{ $page->siteName }}" />
<meta property="og:title" content="{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}" />
<meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />
<meta property="og:url" content="{{ $page->getUrl() }}" />
<meta property="og:image" content="/assets/img/logo.png" />
<meta property="og:image:alt" content="{{ $page->siteName }}" />
<meta property="og:type" content="website" />

<meta name="twitter:image" content="/assets/img/logo.png">
<meta name="twitter:image:alt" content="{{ $page->siteName }}">
<meta name="twitter:card" content="summary_large_image">
