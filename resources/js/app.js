import Vue from 'vue'
import routers from './router'

require('./bootstrap');


Vue.component('app-main', require('./component/main.vue').default);


const app = new Vue({
    el: '#app',
    router: routers,
});