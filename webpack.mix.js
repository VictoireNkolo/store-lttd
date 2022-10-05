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

var pluginPath = 'resources/js/plugin/'
var vendorPath = 'resources/js/vendor/'


mix.combine(
    [
        // ** Required Plugins **
        vendorPath + "jquery/jquery.min.js",
        vendorPath + "bootstrap/js/bootstrap.bundle.min.js",
        vendorPath + "jquery-easing/jquery.easing.min.js",
        vendorPath + "chart.js/Chart.min.js",
        vendorPath + "datatables/jquery.dataTables.js",
        vendorPath + "datatables/dataTables.bootstrap4.js",

        pluginPath + "sb-admin.min.js",
        pluginPath + "sb-admin-datatables.min.js",
        pluginPath + "sb-admin-charts.min.js"
    ],
    "public/js/admin.js"
)

    .combine(
        [
            vendorPath + "bootstrap/css/bootstrap.min.css",
            vendorPath + "font-awesome/css/font-awesome.min.css",
            vendorPath + "datatables/dataTables.bootstrap4.css"
        ],
        "public/css/plugin_admin.css"
    )

    .js("resources/js/app.js", "public/js")

    .sass("resources/sass/app.scss", "public/css")

    .options({
        processCssUrls: false
    })

    .disableSuccessNotifications()

    .version();
