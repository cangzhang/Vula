function bootstrap (callback) {
    const Vue = require('./bootstrap')
    const App = require('../../../Vula/Resources/vue/app.vue')

    new Vue({
        el    : '#app-container',
        render: h => h(App)
    })

    if (typeof callback === 'function') {
        callback();
    }
}

export default function (callback) {
    bootstrap(callback);
};