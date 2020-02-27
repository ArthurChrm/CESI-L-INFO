import Vuetify from 'vuetify';

require('./bootstrap');

window.Vue = require('vue');
Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});
