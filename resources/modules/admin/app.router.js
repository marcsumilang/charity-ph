import Config from '../../configs/app.config';
import App from './app.component';
import LoginComponent from './components/auth/login.component';


//dashboard agent
import DashboardComponent from './components/dashboard/dashboard.component';




//profile
// import ProfileComponent from './components/profile/profile.component';
//
//
// function requireRole(to, from, next) {
//
//     const authRoles = JSON.parse(auth.admin_role.roles);
//
//
//     const found = authRoles.some(el => el == to.meta.role);
//
//     if (found) {
//         next();
//
//     }else{
//         next(prefix + '/my-profile');
//     }
//
//
//
//
// }

export default [

    {
        name: 'app',
        path: Config.admin_prefix + '/',
        component: App,
        meta: {
            navigation: {
                parent: '',
                child: '',
            },
            title: 'Dashboard'
        }
    },
    {
        name: 'login',
        path: Config.admin_prefix + '/login',
        component: LoginComponent,
        meta: {
            navigation: {
                parent: '',
                child: '',
            },
            title: 'Login'
        }
    },
    {
        name: 'dashboard',
        path: Config.admin_prefix + '/dashboard',
        component: DashboardComponent,
        // beforeEnter: requireRole,
        meta: {
            navigation: {
                parent: 'dashboard',
                child: '',
            },
            // role: 'Dashboard',
            title: 'Dashboard'
        }
    },
    //accounts
    {
        name: 'admin-create',
        path: Config.admin_prefix + '/account/admins/create',
        component: require('./components/account/admin/form.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'account',
                child: 'admins',
            },
            role: "Accounts",
            title: 'Create Admin'
        }
    },
    {
        name: 'admin-update',
        path: Config.admin_prefix + '/account/admins/:id/edit',
        component: require('./components/account/admin/form.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'account',
                child: 'admins',
            },
            role: "Accounts",
            title: 'Update Admin'
        }

    },
    {
        name: 'admin-list',
        path: Config.admin_prefix + '/account/admins',
        component: require('./components/account/admin/list.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'account',
                child: 'admins',
            },
            role: "Accounts",
            title: 'List of Admins'
        }
    },
    //careers
    {
        name: 'career-create',
        path: Config.admin_prefix + '/careers/create',
        component: require('./components/career/form.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'careers',
                child: '',
            },
            role: "Careers",
            title: 'Create Career'
        }
    },
    {
        name: 'career-update',
        path: Config.admin_prefix + '/careers/:id/edit',
        component: require('./components/career/form.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'careers',
                child: '',
            },
            role: "Careers",
            title: 'Update Career'
        }

    },
    {
        name: 'career-list',
        path: Config.admin_prefix + '/careers',
        component: require('./components/career/list.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'careers',
                child: '',
            },
            role: "Careers",
            title: 'List of Career'
        }
    },
    {
        name: 'donation-list',
        path: Config.admin_prefix + '/donations',
        component: require('./components/donation/list.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'donations',
                child: '',
            },
            role: "Donations",
            title: 'List of Donations'
        }
    },
    {
        name: 'inquiry-list',
        path: Config.admin_prefix + '/inquiries',
        component: require('./components/contact/list.component'),
        meta: {
            navigation: {
                parent: 'inquiries',
                child: '',
            },
            role: "inquiries",
            title: 'List of inquiries'
        }
    },

    //Mail Setting
    {
        name: 'mail-setting-create',
        path: Config.admin_prefix + '/mail-settings/create',
        component: require('./components/mail-setting/form.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'mail-setting',
                child: '',
            },
            role: "",
            title: 'Create Setting'
        }
    },
    {
        name: 'mail-setting-update',
        path: Config.admin_prefix + '/mail-settings/:id/edit',
        component: require('./components/mail-setting/form.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'mail-setting',
                child: '',
            },
            role: "",
            title: 'Update Setting'
        }

    },
    {
        name: 'mail-setting-list',
        path: Config.admin_prefix + '/mail-settings',
        component: require('./components/mail-setting/list.component'),
        // beforeEnter : requireRole,
        meta: {
            navigation: {
                parent: 'mail-setting',
                child: '',
            },
            role: "",
            title: 'List of Settings'
        }
    },
    {
        name: 'error-404',
        path: '*',
        component: require('./components/error/code-404.component'),
        meta: {
            navigation: {
                parent: '',
                child: '',
            },
            role: "",
            title: ''
        }

    }

];
