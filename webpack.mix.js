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

mix.js('resources/js/app.js', 'public/js').version()
    .js('resources/js/custom.js', 'public/js/custom.js')
    .js('resources/js/bootstrap5.js', 'public/js/bootstrap5.js')
    .js('resources/js/cart.js', 'public/js/cart.js')
    .js('resources/js/ckeditor.js', 'public/js/ckeditor.js')
    .js('resources/js/main.js', 'public/js/main.js')
    .js('resources/js/sidemenu.js', 'public/js/sidemenu.js')
    .styles('resources/css/custom.css', 'public/css/custom.css')
    .styles('resources/css/dashboard.css', 'public/css/dashboard.css')
    .styles('resources/css/sidemenu.css', 'public/css/sidemenu.css')
    .styles('resources/css/style.css', 'public/css/style.css')
    .styles('resources/css/slider.css', 'public/css/slider.css')
    .styles('resources/css/bootstrap5.css', 'public/css/bootstrap5.css')

.sourceMaps().version();