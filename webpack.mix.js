const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync({
        open: 'external',
        host: 'ym23.devel',
        proxy: 'ym23.devel',
        files: ['resources/views/**/*.php', 'app/**/*.php', 'routes/**/*.php', 'public/js/**/*.js', 'public/css/**/*.css','public/vendors/**/**.js,*.css']
    });