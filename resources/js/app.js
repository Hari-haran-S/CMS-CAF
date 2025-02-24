/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError, } from 'vform';
import Gate from './Gate';
Vue.prototype.$gate = new Gate(window.user);
import swal from 'sweetalert2'

window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
});
import XLSX from 'xlsx';
window.XLSX = XLSX;
window.toast = toast;
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination',require('laravel-vue-pagination'));
import grubbs from 'grubbs';
window.grubbs = grubbs;
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar,{
  color: 'rgb(143,255,199)',
  failedcolor: 'red',
  height: '7px'
})

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default},
    { path: '/dailyacts', component: require('./components/Dailyacts.vue').default},
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default},
    { path: '/animalinfos', component: require('./components/Animalinfos.vue').default},
    { path: '/breedings', component: require('./components/Breedings.vue').default},
    { path: '/stocks', component: require('./components/Stocks.vue').default},
    { path: '/toxicitytesting', component: require('./components/Toxicitytesting.vue').default}

  ]

  const router = new VueRouter({
    mode: 'history',
    routes ,// short for `routes: routes`
    // path: '/dailyacts/index',
    // name: 'dailyacts'
  })

Vue.filter('upText',function(text){
  return text.charAt(0).toUpperCase()+text.slice(1)
});
Vue.filter('myDate',function(created){
  return moment(created).format('MMMM Do YYYY');
})
  
window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));


//passport component
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

//end passport component

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data: {
        search: ''
    },
    methods:{
      searchit: _.debounce(()=>{
        // console.log('broo');
        // Fire.$emit('searchingDA');
        // Fire.$emit('searchingAD');
        // Fire.$emit('searchingBD');
        // Fire.$emit('searchingST');
        Fire.$emit('searching');
      },1000)
    },
    
});
