/*++ generated */
require('./bootstrap');
window.Vue = require('vue');
/*-- generated */
import Vue from 'vue';
import Main from './Main';
// import routes from './routes';
Vue.config.productionTip = false;

// Vue.use(VueRouter);

/* eslint-disable no-new */
new Vue({
    el: '#vue',
    components: { Main },
    template: '<Main/>',
    // router: new VueRouter({ routes }),
    // store,
});
