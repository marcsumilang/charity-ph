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
mix.autoload({
    'jquery': ['$', 'window.jQuery', 'jQuery'],
    'vue': ['Vue', 'window.Vue'],
    // 'moment': ['moment','window.moment'],
})

mix.js([
    'resources/modules/app.module.js',
    'resources/assets/js/main.js',
    'resources/assets/admin/js/plugins/bootstrap-notify.js',

], 'public/js/app.js')
.sass('resources/assets/scss/app.scss', 'public/css')
    .version();


//admin
mix.js(
    [
        'resources/modules/admin/app.module.js',
        'resources/assets/admin/js/plugins/bootstrap-switch.js',
        'resources/assets/admin/js/plugins/bootstrap-notify.js',
        'resources/assets/admin/js/plugins/light-bootstrap-dashboard.js',
        // 'node_modules/moment/moment.js',
        // 'resources/assets/js/jquery-ui/jquery-ui.min.js',
        // 'resources/assets/admin/js/plugins/chartist.min.js',

    ], 'public/administrator/js/app.js')
    .sass('resources/assets/admin/sass/app.scss', 'public/administrator/css')
    .version();
mix.copyDirectory('resources/assets/admin/images', 'public/administrator/images');
mix.copyDirectory('resources/assets/images', 'public/images');