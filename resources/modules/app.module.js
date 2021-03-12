/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
import LoadPlugin from "../cores/services/jquery/load.plugin";

require('../assets/bootstrap');
window.moment = require('moment');
window.Vue = require('vue');


import VueRouter from 'vue-router';

import AppRouter from './app.router';

import AppMixin from './app.mixin';


//includes
import PublicHeaderComponent from '../cores/includes/public-navbar.component';
import PublicFooterComponent from '../cores/includes/public-footer.component';


Vue.use(VueRouter);
Vue.mixin(AppMixin);



const loadPlugin = new LoadPlugin();
const router = new VueRouter(
    {
        mode: 'history',
        routes: AppRouter,
        scrollBehavior(to, from, savedPosition) {

            return {x: 0, y: 0}
        }
    });


const app = new Vue(Vue.util.extend({

    router,
    components: {PublicHeaderComponent, PublicFooterComponent},
    mounted: function () {
        // console.log(this.$route.name);

        loadPlugin.app();
    },
    methods: {},
    watch: {
        $route(to, from) {

            loadPlugin.app();

        }
    }


})).$mount('#app');
