// require('./bootstrap');
import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './App.vue';
import Home from '../js/components/Home';
import TransportList from '../js/components/TransportList';
import AddTransport from '../js/components/AddTransport';
import EditTransport from '../js/components/EditTransport';

import VueSweetalert2 from 'vue-sweetalert2';
window.Swal = require('sweetalert2');
Vue.use(VueSweetalert2);

import utils from './helpers/utilities';
Vue.prototype.$utils = utils;

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

const routes = [
  {
    name: '/transports',
    path: '/transports',
    component: TransportList
  },
  {
    name: '/add_transport',
    path: '/add_transport',
    component: AddTransport
  },
  {
    name: 'get_transport',
    path: '/get_transport/edit/:id?',
    component: EditTransport
  },
]


const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
