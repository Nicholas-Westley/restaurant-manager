/*++ generated */
require('./bootstrap');
window.Vue = require('vue');
/*-- generated */
import Vue from 'vue';
import Main from './components/Main';
// import routes from './routes';
Vue.config.productionTip = false;
axios.defaults.baseURL = `http://food-order-tracker.development/api/`;

const token= document.getElementsByName('csrf-token')[0];
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : token.content
};


// Vue.use(VueRouter);

/* eslint-disable no-new */
new Vue({
    el: '#vue',
    components: { Main },
    template: '<Main/>',
    // router: new VueRouter({ routes }),
    // store,
});
