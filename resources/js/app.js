import Vuetify from 'vuetify';


import NavComponent from './components/NavComponent.vue';
import CardFileComponent from './components/CardFileComponent.vue';
import CardEventComponent from './components/CardEventComponent.vue';
import CardProfileChangeComponent from './components/CardProfileChangeComponent.vue';
import MessagerieComponent from "./components/MessagerieComponent.vue";
import TrombiComponent from './components/TrombiComponent.vue';

require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.min');

window.Vue = require('vue');
Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: {NavComponent,CardFileComponent, CardEventComponent, CardProfileChangeComponent, MessagerieComponent,TrombiComponent}
});
