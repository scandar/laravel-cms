const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
    //  'resources/assets/css/libs/bootstrap-rtl.css',
     'resources/assets/css/libs/bootstrap.css',
     'resources/assets/css/libs/sb-admin.css'
   ], 'public/css/libs.css');
  //  .scripts([
  //    'resources/assets/js/libs/bootstrap.js',
  //    'resources/assets/js/libs/jquery.js'
  //  ], 'public/js/libs.js');
