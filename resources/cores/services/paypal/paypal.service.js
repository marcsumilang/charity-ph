import axios from "axios";

var promise;


export default class PayPalService {



    checkout (data){

        promise = axios.post('/api.public/checkout/payment/paypal',data);

        return promise;
    }



}
