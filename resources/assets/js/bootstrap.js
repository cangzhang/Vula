window._ = require('lodash');

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

import Vue from 'vue'
import VueResource from 'vue-resource'
import Vuex from 'vuex'

Vue.use(VueResource)
Vue.use(Vuex)

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});

module.exports = Vue
