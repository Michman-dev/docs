<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="home" href="{{ $page->baseUrl }}">

        @include('_partials.favicons')

        <link rel="sitemap" type="application/xml" href="https://docs.michman.dev/sitemap.xml">

        <link rel="canonical" href="{{ slashedUrl($page->getUrl()) }}">

        <title>{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}</title>
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        @include('_partials.socials')

        @if($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif

        @stack('meta')

        @if($page->production)
            {{-- Insert analytics code here --}}
        @endif

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@400;600;700&display=swap">

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        {{-- JavaScript --}}
        <script src="{{ mix('js/main.js', 'assets/build') }}" defer></script>
    </head>

    <body class="w-screen min-h-screen overflow-x-hidden flex flex-col justify-between bg-navy-100 text-gray-100 leading-normal font-sans antialiased {{ $page->production ? '' : 'debug-screens' }}">
        <header class="w-full flex items-center bg-navy-300 h-16 md:h-24 mb-8 py-4" role="banner">
            <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center text-gold-800 hover:text-gold-700 active:text-gold-600">
                        <span class="text-xl md:text-2xl font-serif font-bold tracking-tight">
                            Michman
                            <span class="text-gray-300 tracking-normal"> Docs</span>
                        </span>
                    </a>
                </div>

                <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                    @if($page->docsearchApiKey && $page->docsearchIndexName)
                        @include('_nav.search-input')
                    @endif
                </div>
            </div>

            @yield('nav-toggle')
        </header>

        <main role="main" class="w-full flex-auto">
            @yield('body')
        </main>

        @stack('scripts')

{{--        TODO: Have something in the footer.--}}
        {{--
        <footer class="bg-navy-300 text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center">
                <li class="md:mr-2">
                    &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}.
                </li>

                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>
        --}}
    </body>
</html>
