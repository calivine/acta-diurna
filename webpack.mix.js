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

 mix.js('resources/js/app.js', 'public/static/js')
     .extract(['vue'])
     .sass('resources/sass/app.scss', 'public/static/css');

mix.scripts([
    'resources/js/dragndrop.js',
    'resources/js/filesEMCA6v2.js',
    'resources/js/settingsDisplay.js'
], 'public/static/js/main.js');

mix.scripts([
    'resources/js/textEditorDisplay.js'
], 'public/static/js/text-editor.js');

mix.scripts([
    'resources/js/postHandler.js',
    'resources/js/viewCounter.js',
    'resources/js/autoplay.js',
    'resources/js/galleryDisplay.js'
], 'public/static/js/viewer.js');

