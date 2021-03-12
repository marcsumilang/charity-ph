import axios from "axios";


var promise;


export default class ContactService {





    list(data) {

        promise = axios.get('/api.admin/contacts', {params: data});
        return promise;
    }

}