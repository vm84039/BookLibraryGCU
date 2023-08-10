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
    .sourceMaps();
mix.postCss('resources/css/styles.css', 'public/css', [
    require('postcss-custom-properties')
]);
mix.js('resources/js/DataTable---Fully-BSS-Editable.js', 'public/js');
mix.js('resources/js/Table-With-Search.js', 'public/js').postCss('resources/css/Table-With-Search.css', 'public/css');
mix.postCss('resources/css/Black-Navbar.css', 'public/css');
mix.postCss('resources/css/Competences-Grid---3-Columns---Hover-Effect-Float-Up.css', 'public/js');
mix.postCss('resources/css/Navbar-With-Button.css', 'public/css');
mix.postCss('resources/css/Table-With-Search-1.css', 'public/css');
mix.js('resources/js/Bootstrap-DataTables.js', 'public/js').postCss('resources/css/Bootstrap-DataTables.css', 'public/css')
mix.copyDirectory('resources/fonts', 'public/fonts');
