const webpack = require("webpack");
const webpackConfig = require('../webpackOnly.config.js');
let toast = require('node-notifier');
require('shelljs/global');

console.log('---------dev');

webpackConfig.debug = true;
webpackConfig.devtool = 'source-map';
webpackConfig.output.pathinfo = true;
webpackConfig.progress = true;
webpackConfig.displayErrorDetails = true;

rm('-rf', webpackConfig.output.path);
mkdir('-p', webpackConfig.output.path);

let compiler = webpack(webpackConfig);

compiler.watch({ // watch options:
    aggregateTimeout: 300, // wait so long for more changes
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