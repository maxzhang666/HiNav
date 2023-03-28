const mix = require('laravel-mix');
const {inProduction} = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.setPublicPath('public/asset');
mix
    .js('resources/js/app.js', 'asset/js')
    .postCss('resources/css/app.css', 'asset/css', [
        //
    ]);
if (inProduction()) {
    mix.version();
} else {
    mix.sourceMaps();
    // mix.browserSync({proxy: 'hinav'});
}
