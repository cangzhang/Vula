const elixir = require('laravel-elixir');

// require('laravel-elixir-vue');
require('laravel-elixir-vue-2');
require('laravel-elixir-webpack-official');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
        .sass(['./resources/assets/note/sass/note.scss'], 'public/css/note.css')
        .sass(['./node_modules/element-ui/packages/theme-default/lib/index'], 'public/css/vendor.css')
        .copy('./node_modules/element-ui/lib/index.js', 'public/js/ele-vendor.js')
        .webpack(['./node_modules/vue/dist/vue.js'], 'public/js/vendor.js')
        .webpack(['./resources/assets/note/js/note.js', './resources/assets/js/app.js'], 'public/js/app.js');
});
