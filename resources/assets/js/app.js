function up(callback, additional) {
    require('./bootstrap');

    const app = new Vue({
        el: '#app'
    });

    if (typeof callback === 'function') {
        callback();
    }
}

module.exports = (callback, additional) => {
    up(callback, additional);
};