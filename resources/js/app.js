import Vuetify from 'vuetify';

import CardFileComponent from './components/CardFileComponent.vue';
require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.min');

window.Vue = require('vue');
Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components:{CardFileComponent}
});
