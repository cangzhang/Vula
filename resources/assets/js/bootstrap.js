require('babel-polyfill');

function bootstrap (callback, additional) {
    window._ = require('lodash');

    window.$ = window.jQuery = require('jquery');
    require('bootstrap-sass');

    window.Vue = require('vue');
    require('vue-resource');

    Vue.config.devtools = false;

    Vue.http.interceptors.push((request, next) => {
        request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
        next();
    });

    callback();

    if (typeof additional === 'function') {
        additional();
    }
}

module.exports = (callback, additional) => {
    bootstrap(callback, additional);
};