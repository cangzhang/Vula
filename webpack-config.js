const path = require('path');
const glob = require('glob');

function getAllEntries () {
    let files = glob.sync('./xzNotes/*/webpackEntry.js');
    let allEntries = {};
    let featureEntries = {};
    for (let i = 0; i < files.length; i++) {
        featureEntries = require(files[i]);
        for (let entry in featureEntries) {
            allEntries[entry] = '.' + featureEntries[entry];
        }
    }
    return allEntries;
}

module.exports = {
    // plugins: [commonsPlugin],
    entry : getAllEntries(),
    output: {
        path    : 'public/js/',
        filename: '[name].js'
    },
    module: {
        loaders: [
            {
                test  : /\.vue$/,
                loader: 'vue'
            },
            {
                test   : /\.js$/,
                exclude: /node_modules/,
                loader : 'babel-loader'
            },
            {
                test  : /\.css$/,
                loader: 'style!css!'
            },
            {
                test  : /\.(sass|scss)/,
                loader: "style!css!sass"
            }]
    }
};
