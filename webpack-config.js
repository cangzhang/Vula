const path = require('path');
const glob = require('glob');

require("babel-polyfill");

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
    output : {
        path         : path.resolve(__dirname, 'public/webpack'),
        publicPath   : "/webpack/",
        filename     : '[name].js',
        chunkFilename: '[id].[chunkhash].js',
    },
    module: {
        rules: [
            {
                test  : /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test   : /\.js$/,
                exclude: /node_modules/,
                loader : 'babel-loader'
            },
            {
                test: /\.css$/,
                use : ["style-loader", "css-loader"]
            },
            {
                test  : /\.(sass|scss)/,
                use : ["style-loader", "css-loader", "sass-loader"]
            }]
    }
};
