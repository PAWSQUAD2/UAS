/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios);
axios.defaults.baseURL = 'http://localhost:8000/api';
window.Vue = require('vue');

require('./bootstrap');
import App from '../views/pages/App.vue'
import Home from '../views/pages/Home.vue'
import Berita from '../views/pages/Berita.vue'
import Member from '../views/pages/Member.vue'
import NotFound from '../views/pages/404.vue'
import MemberView from '../views/pages/MemberView.vue'

const router = new VueRouter({
    mode: 'history',
     base: window.location.pathName,
    routes: [{
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                auth: undefined

            }
        },
        {
            path: '/berita',
            name: 'berita',
            component: Berita,
        },
        {
            path: '/member',
            name: 'member',
            component : Member,
            meta:{
                auth:false,
                forbiddenRedirect:'/',
                notFoundRedirect:'/',
            },
            
        },
        {
            path: '/memberView',
            name: 'member_view',
            component: MemberView,
            meta:{
                auth:true
            }
        }
        ,
        {
            path: '/*',
            name: '404',
            component: NotFound,
        },
    ],
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component('ksr-footer', require('./components/Footer.vue'));
Vue.component('nav-header', require('./components/Header.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.router = router;

Vue.use(require('@websanova/vue-auth'), {

    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),

    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),

    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    authRedirect: {
        path: '/member'
    },
    rolesVar: 'role'
});
const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
});
