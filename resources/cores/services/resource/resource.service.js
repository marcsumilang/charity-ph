import axios from "axios";
import Config from "../../../configs/app.config";

var promise;


export default class ResourceService {



    getAuth (){

        return JSON.parse( localStorage.getItem('authAdmin'));

    }



    getStatusOptions (){

        promise = axios.get('/api.public/resources/get-status-options');

        return promise;
    }


    getMailOptions (){

        promise = axios.get('/api.public/resources/get-mail-options');

        return promise;
    }
    
}
