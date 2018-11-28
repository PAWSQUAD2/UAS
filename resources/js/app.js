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
axios.interceptors.request.use(config => {
    NProgress.start()
    return config
})

// before a response is returned stop nprogress
axios.interceptors.response.use(response => {
    NProgress.done()
    return response
})

window.Vue = require('vue');
import NProgress from 'nprogress'
import 'nprogress/nprogress.css'

require('./bootstrap');
import App from '../views/pages/App.vue'
import Home from '../views/pages/Home.vue'
import Berita from '../views/pages/Berita.vue'
import Member from '../views/pages/Member.vue'
import NotFound from '../views/pages/404.vue'
import MemberView from '../views/pages/MemberView.vue'
import NewMemberView from '../views/pages/NewMemberView.vue'
import Profile from '../views/pages/Profile.vue'
import EmailVerifier from '../views/pages/EmailVerifier.vue'
import BeritaControl from '../views/pages/BeritaControl.vue'
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
    },{
        path: '/controlBerita',
        name : 'controlBerita',
        component: BeritaControl,
        meta:{
            auth: true,
            forbiddenRedirect: '/',
            notFoundRedirect: '/',
        }
    },
    {
        path: '/verify',
        name: 'verify',
        component: EmailVerifier,
        meta: {
            auth: false,
            forbiddenRedirect: '/',
            notFoundRedirect: '/',
        },
    }
    ,
    {
        path: '/berita',
        name: 'berita',
        component: Berita,
    },
    {
        path: '/member',
        name: 'member',
        component: Member,
        meta: {
            auth: false,
            forbiddenRedirect: '/',
            notFoundRedirect: '/',
        },

    },
    {
        path: '/memberView',
        name: 'member_view',
        component: MemberView,
        meta: {
            auth: true
        }
    },
    {
        path: '/newMemberView',
        name: 'new_member_view',
        component: NewMemberView,
        meta: {
            auth: true
        }
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
            auth: true
        }
    },
    {
        path: '/*',
        name: '404',
        component: NotFound,
    },
    ],
});

router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
        // Start the route progress bar.
        NProgress.start()
    }
    next()
})

router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    NProgress.done()
})
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
Vue.component('tabel-member-baru', require('./components/NewMemberTable'));
Vue.component('tabel-member', require('./components/MemberTable'));
Vue.component('comment', require('./components/Comment'));
Vue.component('comments-box', require('./components/CommentsBox'));
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