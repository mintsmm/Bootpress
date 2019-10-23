let mix = require('laravel-mix');

mix.browserSync({
    proxy: 'http://bootpress.co.za/',
    files: [
        '**/*.php',
        'assets/dist/css/**/*.css',
        'assets/dist/js/**/*.js'
    ],
    injectChanges: true,
    open: false
});

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix.setPublicPath('./assets/dist');

// Compile assets
mix.js('assets/src/scripts/app.js', 'assets/dist/js')
    .js('assets/src/scripts/customizer.js', 'assets/dist/js')
    .react('assets/src/scripts/gutenberg.js', 'assets/dist/js')
    .sass('assets/src/sass/style.scss', 'assets/dist/css')
    .sass('assets/src/sass/gutenberg.scss', 'assets/dist/css');

if (mix.inProduction()) {
    mix.version();
}