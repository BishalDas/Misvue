/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform';


import Gate from "./Gate";
Vue.prototype.$gate= new Gate(window.user);


import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;



Vue.use(VueRouter)
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar,{
  color: 'rgb(143,255,199)',
  failedColor: 'red',
  height: '3px'
})


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
let routes = [
    { path: '/roles', component: require('./components/RolesComponent.vue').default },
    { path: '/users', component: require('./components/UsersComponent.vue').default },
    { path: '/grade', component: require('./components/GradeComponent.vue').default },
    { path: '/grade-subjects', component: require('./components/GradeSubjectComponent.vue').default },
    { path: '/section', component: require('./components/SectionComponent.vue').default },
    { path: '/add-student', component: require('./components/StudentComponent.vue').default },
    { path: '/student-attendance', component: require('./components/AttendanceComponent.vue').default },
    { path: '/exam', component: require('./components/ExamComponent.vue').default },
    { path: '/marks', component: require('./components/MarksComponent.vue').default },
    { path: '/test', component: require('./components/TestComponent.vue').default },
    { path: '/add-teacher', component: require('./components/TeacherComponent.vue').default },
  ]
window.Fire =new Vue();

const router = new VueRouter({
  mode: 'history',
  routes  
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
