const path = require('path');
const glob = require('glob');

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
