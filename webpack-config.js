const path = require('path');
const glob = require('glob');

require("babel-polyfill");

function assetsPath (_path) {
    return 'static/' + _path;
}

function getAllEntries () {
    let entries = require('./Vula/Entry/entry.js');
    let allEntries = {};
    for (let entryName in entries) {
        allEntries[entryName] = '.' + entries[entryName];
    }
    console.log(allEntries);
    return allEntries;
}

module.exports = {
    // plugins: [commonsPlugin],
    entry : getAllEntries(),
    output: {
        path         : path.resolve(__dirname, 'public/webpack'),
        publicPath   : "/webpack/",
        filename     : '[name].js',
        chunkFilename: '[id].[chunkhash].js',
    },
    module: {
        rules: [
            {
                test   : /\.vue$/,
                exclude: '/node_modules/',
                loader : 'vue-loader',
                options: {
                    js: 'babel-loader'
                }
            },
            {
                test   : /\.js$/,
                exclude: /node_modules/,
                loader : 'babel-loader',
                query  : {
                    presets: ['es2015']
                }
            },
            {
                test: /\.(sass|scss|css)/,
                use : ["style-loader", "css-loader", "sass-loader"]
            },
            {
                test   : /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                loader : 'file-loader',
                options: {
                    name: assetsPath('images/[name].[ext]?[hash]')
                }
            },
            {
                test  : /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
                loader: 'url-loader',
                query : {
                    limit: 10000,
                    name : assetsPath('fonts/[name].[hash:7].[ext]')
                }
            }
        ]
    }
};
