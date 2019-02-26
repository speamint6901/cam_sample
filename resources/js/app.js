
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import axios from 'axios';
import store from './store/index.js';
import router from './router';
import * as config from './config';
import http from './http';

window.state = store.state;
window.Vue = Vue;

axios.interceptors.request.use(config => {
    config.headers['X-CSRF-TOKEN']     = window.Laravel.csrfToken;
    config.headers['X-Requested-With'] = 'XMLHttpRequest';
    config.headers['Authorization']    = `Bearer ${localStorage.getItem('jwt_token')}`;
    return config;
}, error => {
    return Promise.reject(error);
});


Vue.component('app', require('./App.vue').default);

Vue.use(http, { store });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    config,
    store,
    router
}).$mount('#app');
