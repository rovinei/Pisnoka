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

mix.js('resources/assets/admin/js/app.js', 'public/admins/js')
    .js('resources/assets/admin/js/dashboard.js', 'public/admins/js')
    .sass('resources/assets/admin/sass/app.scss', 'public/admins/css')
    .sass('resources/assets/admin/sass/dashboard.scss', 'public/admins/css')
    .sass('public/sass/style.scss', 'public/css');

