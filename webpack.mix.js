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
var plugin =  'public/vendors/';
mix.js('resources/assets/js/app.js', 'public/js')
	.combine([
    plugin + 'jquery/dist/jquery.min.js',
    plugin + 'popper/popper.min.js',
    plugin + 'bootstrap/dist/bootstrap.min.js',
    plugin + 'fastclick/lib/fastclick.js',
    plugin + 'toastr/toastr.min.js',
    plugin + 'slimscroll/jquery.slimscroll.js',
    plugin + 'malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
    'public/js/app.js',
  	],'public/js/bundle.min.js')
   .sass('resources/assets/sass/app.scss', 'public/css');


