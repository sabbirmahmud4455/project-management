import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Home from './pages/home.vue'

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            component: Home,
            name: 'home',
        },
        
    ]
});

export default routes;