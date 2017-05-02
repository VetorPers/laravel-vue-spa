/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../bootstrap');
window.Vue = require('vue');

import ElementUI from 'element-ui';
import Main from './main';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import routes from './routes';
import store from './vuex/store';

Vue.use(ElementUI);
Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
    routes
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./../components/Example.vue'));

const web = new Vue({
    router,
    store,
    render: h => h(Main)
}).$mount('#web');
