
require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import Main from './web-app/Main';
import MainSettings from './settings-app/MainSettings';
import './plugins/vuetify';
import './axios';
import 'restaurant-manager-vue-chef-library/dist/restaurant-manager-vue-chef-library.css';
import 'restaurant-manager-vue-chef-library/dist/restaurant-manager-vue-order-library.css';

Vue.config.productionTip = false;

if(document.getElementById("vue")) {
    /* eslint-disable no-new */
    new Vue({
        el: '#vue',
        components: {Main},
        template: '<Main/>',
    });
}

if(document.getElementById("vue-settings")) {
    /* eslint-disable no-new */
    new Vue({
        el: '#vue-settings',
        components: {MainSettings},
        template: '<MainSettings/>',
    });
}


