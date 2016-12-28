const elixir = require('laravel-elixir');
const path = require('path');

require('laravel-elixir-vue-2');
require('laravel-elixir-webpack-official');

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
				exclude: /node_modules/,
				query: {
          			presets: ['es2015']
	  			}
			}
		]
	}
});

elixir(mix => {
    mix.sass('app.scss')
        .sass(['./resources/assets/note/sass/note.scss'], 'public/css/note.css')
		.webpack('app.js');
});
