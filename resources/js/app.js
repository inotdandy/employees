import Vue from 'vue';
import VueRouter from 'vue-router'
import {routes} from './routes'

require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter)

Vue.component('Index', require('./components/employees/Index.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes
})


const app = new Vue({
    el: '#app',
    router
});
