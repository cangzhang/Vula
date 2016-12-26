require('./bootstrap');

import AppContent from './App.vue';

new Vue({
  el: '#app-content',
  render: h => h(AppContent)
});
