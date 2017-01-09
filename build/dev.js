const webpack = require("webpack"),
  webpackConfig = require('../webpack.config.js'),
  toast = require('node-notifier');
require('shelljs/global');

console.log('----dev----');

webpackConfig.debug = true;
webpackConfig.devtool = 'source-map';
webpackConfig.output.pathinfo = true;
webpackConfig.progress = true;
webpackConfig.displayErrorDetails = true;

rm('-rf', webpackConfig.output.path);
mkdir('-p', webpackConfig.output.path);

let compiler = webpack(webpackConfig);

compiler.watch({ // watch options:
    aggregateTimeout: 500, // wait so long for more changes
    poll            : true // use polling instead of native watchers
    // pass a number to set the polling interval
}, function (err, stats) {
    // ...
    // Object
    console.log('[webpack:build]', stats.toString({
        chunks: false, // Makes the build much quieter
        colors: true
    }));
    toast.notify('Build completed');
});