import axios from "axios";

var promise;


export default class DonateService {



    donate (data){

        promise = axios.post('/api.public/checkout/donates',data);

        return promise;
    }



}
