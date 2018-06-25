let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/css/customcss.css',
    'public/css/loading-bar.css'
],'public/css/combinedCss.css');

mix.scripts([
    'public/js/ajaxJS.js',
    'public/js/cookies.js',
    'public/js/loading-bar.js',
    'public/js/pageNumberDesign.js',
    'public/js/url.js'
],'public/js/combinedJS.js');

