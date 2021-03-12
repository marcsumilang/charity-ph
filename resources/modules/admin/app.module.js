/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
import ResourceService from "../../cores/services/resource/resource.service";

require('../../assets/bootstrap');
window.moment = require('moment');
window.Vue = require('vue');
// window.auth = JSON.parse( localStorage.getItem('authAdmin'));
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import AppRouter from './app.router';
// import routes from './app.router';
import AdminSideBar from '../../cores/includes/admin-sidebar.component';
import AdminNavBar from '../../cores/includes/admin-navbar.component';
import AppMixin from '../app.mixin';
import CKEditor from '@ckeditor/ckeditor5-vue';



Vue.use(VueRouter);
Vue.use( CKEditor );
Vue.mixin(AppMixin);

Vue.component('admin-sidebar-component', AdminSideBar);
Vue.component('admin-navbar-component', AdminNavBar);

const router = new VueRouter(
    {
        mode: 'history',
        routes: AppRouter
    }),
resourceService = new ResourceService();


const app = new Vue(Vue.util.extend({

    router,
    mounted: function () {


        if(!resourceService.getAuth() && this.$route.name != "login"){
            location.href = prefix + '/logout';
        }



    },
    methods: {

        initializeDatePicker: function () {

            //
            // $(document).ready(function () {
            //
            //
            //     var self = this;
            //     for (var i = 1; i <= $('.date-picker').length; i++) {
            //         $('#datepicker-' + i).datepicker({
            //             dateFormat: 'yy-mm-dd',
            //             onSelect: function (selectedDate, datePicker) {
            //                 self.date = selectedDate;
            //
            //             }
            //         });
            //     }
            //
            //
            // });
        }
    },
    watch: {
        $route(to, from) {
            // this.initializeDatePicker();
            console.log(to);
        }
    }


})).$mount('#app');
