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

mix.sass('resources/assets/sass/app.scss',          'public/css')
    .sass('resources/assets/sass/pdf.scss',         'public/css')
    .sass('resources/assets/sass/pdf_escala.scss',  'public/css')
    .version();
   
mix.js('resources/assets/js/app.js', 'public/js').sourceMaps(); 
   
mix.copyDirectory('vendor/twbs/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts/bootstrap');

mix.copyDirectory('resources/assets/vendor/bootstrap-datetimepicker',   'public/bootstrap-datetimepicker');
mix.copyDirectory('resources/assets/vendor/datatables',                 'public/datatables');
mix.copyDirectory('resources/assets/vendor/pdfmake',                    'public/pdfmake');
mix.copyDirectory('resources/assets/vendor/icheck',                     'public/icheck');
mix.copyDirectory('resources/assets/js/TinyMCE-pt_BR',                  'public/js/TinyMCE-pt_BR');

//mix.copyDirectory('node_modules/inputmask', 'public/inputmask');

mix.scripts([
    // Pntify
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.buttons.js'
],  'public/js/components.js'); 

mix.copyDirectory('node_modules/tinymce/icons', 'public/js/tinymce/icons');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/js/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/js/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/js/tinymce/themes');
mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/js/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/js/tinymce/jquery.tinymce.min.js');
mix.copy('node_modules/tinymce/tinymce.js', 'public/js/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/js/tinymce/tinymce.min.js');
