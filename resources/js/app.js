require('./bootstrap');

import Vue from 'vue'
import routers from './router'

//vfrom 
import { HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//vfrom 


//vue2 editor
import Vue2Editor from "vue2-editor";
Vue.use(Vue2Editor);
//vue2 editor


//toggle switch
import ToggleSwitch from 'vuejs-toggle-switch'
Vue.use(ToggleSwitch)



//toster notification
import CxltToastr from 'cxlt-vue2-toastr'

var toastrConfigs = {
    position: 'top right',
    showDuration: 500,
    progressBar: true,
    closeButton: true,
    showMethod: 'bounceIn',
    hideMethod: 'bounceOut',
    showDuration: 500,
    hideDuration: 1000,
    timeOut: 5000,
}
Vue.use(CxltToastr, toastrConfigs)
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'
//toster notification


//main app component
Vue.component('app-main', require('./component/main.vue').default);

//pagination component
Vue.component('pagination', require('laravel-vue-pagination'));



const app = new Vue({
    el: '#app',
    router: routers,
});