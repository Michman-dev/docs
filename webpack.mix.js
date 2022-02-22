const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableNotifications();
mix.setPublicPath('source/assets/build');

mix
    .webpackConfig({ stats: { children: true }})
    .js('source/_assets/js/main.js', 'js')
    .postCss('source/_assets/css/main.pcss', 'css/main.css')
    .copyDirectory('source/_assets/webfonts', 'source/assets/build/webfonts')
    .jigsaw({
        browserSync: false,
        watch: [
            'config.php',
            'navigation.php',
            'markdown.php',
            'source/**/*.md',
            'source/**/*.php',
            'source/**/*.pcss',
        ],
    })
    .options({
        processCssUrls: false,
        postCss: [
            require('postcss-import'),
            require('tailwindcss/nesting'),
            require('tailwindcss'),
            require('autoprefixer'),
        ],
    })
    .version();

if (! mix.inProduction()) {
    mix.sourceMaps();
}
