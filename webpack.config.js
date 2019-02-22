var Encore = require('@symfony/webpack-encore');

Encore
// directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */

    .addEntry('js/app', [
        './assets/js/app.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',


    ])
    .addStyleEntry('css/app', [
        './assets/css/app.css',
        './node_modules/bootstrap/dist/css/bootstrap.min.css',

    ])
    .addEntry('js/allProducts', [
        './assets/js/allProducts.js',
    ])
    .addStyleEntry('css/allProducts', [
        './assets/css/allProducts.css',
    ])
    .addStyleEntry('css/profile', [
        './assets/css/profile.css',
    ])
    .addStyleEntry('css/login', [
        './assets/css/login.css',
    ])
    .addStyleEntry('css/register', [
        './assets/css/register.css',
    ])
    .addStyleEntry('css/product', [
        './assets/css/product.css',
    ])

    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app


    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

// enables Sass/SCSS support
//.enableSassLoader()

// uncomment if you use TypeScript
//.enableTypeScriptLoader()

// uncomment if you're having problems with a jQuery plugin
//.autoProvidejQuery()

// uncomment if you use API Platform Admin (composer req api-admin)
//.enableReactPreset()
//.addEntry('admin', './assets/js/admin.js')
;

module.exports = Encore.getWebpackConfig();
