import Config from './web-app/config/config';
import Vue from "vue";
const axios =  require('axios');
axios.defaults.baseURL = Config.api;
const token= document.getElementsByName('csrf-token')[0];
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : token.content
};
Vue.prototype.axios = axios;
