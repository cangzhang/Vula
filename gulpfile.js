const elixir = require('laravel-elixir');
const path = require('path');

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

Elixir.webpack.config.module.loaders = [];

Elixir.webpack.mergeConfig({
	resolveLoader: {
		root: path.join(__dirname, 'node_modules'),
	},
	module: {
		loaders: [
			{
				test: /\.js$/,
				loader: 'babel',
				exclude: /node_modules/
			}
		]
	}
});

elixir(mix => {
    mix.sass('app.scss')
        .sass(['./resources/assets/note/sass/note.scss'], 'public/css/note.css')
		.webpack('app.js');
});
