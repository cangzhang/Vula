require('./bootstrap')(() => {
    const App = require('./App.vue');
    const NavLogin = require('./components/NavBar.vue');

    new Vue({
        el: '#main',
        render: h => h(App)
    });

    new Vue({
        el: '#login',
        render: h => h(NavLogin)
    });
});
