require('./bootstrap')(() => {
    const App = require('./App.vue');

    new Vue({
        el: '#main',
        render: h => h(App)
    });
});
