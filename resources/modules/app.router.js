
import HomeComponent from './components/home/home.component';
import DonateComponent from './components/donate/donate.component.vue';
import CareerComponent from './components/career/career.component.vue';
import PaymentSuccessComponent from './components/payment/payment-success/payment-succes.component';
import PaymentCancelComponent from './components/payment/payment-cancel/payment-cancel.component';
import PaymentDepositComponent from './components/payment/payment-deposit/payment-deposit.component'

export default [
    {
        name: 'home',
        path: '/',
        component: HomeComponent,
        meta: {}

    },
    {
        name: 'donate',
        path: '/donate',
        component: DonateComponent,
        meta: {
            group_name: 'donate'
        }

    },
    {
        name: 'career',
        path: '/career',
        component: CareerComponent,
        meta: {}

    },
    {
        name: 'payment-success',
        path: '/payment/success',
        component: PaymentSuccessComponent,
        meta: {            
            group_name: 'donate'
        }

    },
    {
        name: 'payment-cancel',
        path: '/payment/cancelled',
        component: PaymentCancelComponent,
        meta: {
            group_name: 'donate'
        }

    },
    {
        name: 'payment-deposit',
        path: '/payment/deposit',
        component: PaymentDepositComponent,
        meta: {
            group_name: 'donate'
        }

    },

];
