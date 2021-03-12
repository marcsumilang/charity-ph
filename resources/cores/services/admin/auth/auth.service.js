import axios from "axios";
import Config from "../../../../configs/app.config";

var promise;


export default class AuthService {



    login(data) {

        promise = axios.post(Config.base_url + Config.admin_prefix +'/login', data);
        return promise;
    }



}