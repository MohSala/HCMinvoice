require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import moment from 'moment';
import { 
    HasError,
    AlertError,
    Form
  } from 'vform';
window.Vue = require('vue');
window.Form = Form;
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert2';
window.swal = swal;


const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
window.toast = toast;  

const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
  }
  
  Vue.use(VueProgressBar, options)

Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));
// const router= new VueRouter({
//     linkActiveClass: "active",
//     linkExactActiveClass: "active",
//     routes:Routes
// });
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.filter('myDate',(created) => {
    return moment(created).format('MMMM Do YYYY');
} )

window.Fire = new Vue();


Vue.component('house', require('./components/Home.vue').default);
Vue.component('user', require('./components/Users.vue').default);
Vue.component('organ', require('./components/Organization.vue').default);
Vue.component('inv', require('./components/Invoice.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('navigation', require('./components/NavigationComponent.vue').default);


const app = new Vue({
    el: '#app',
});
