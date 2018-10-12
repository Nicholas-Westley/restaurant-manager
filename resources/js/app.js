
require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue';
import Main from './web-app/Main';
import MainSettings from './settings-app/MainSettings';
Vue.config.productionTip = false;
axios.defaults.baseURL = `http://food-order-tracker.development/api/`;

const token= document.getElementsByName('csrf-token')[0];
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : token.content
};

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


