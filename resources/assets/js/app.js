function bootstrap(callback) {
    require('./bootstrap');

    const app = new Vue({
        el: '#app'
    });

    if (typeof callback === 'function') {
        callback();
    }
}

module.exports = (callback) => {
    bootstrap(callback);
};