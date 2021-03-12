import axios from "axios";

var promise;


export default class ContactService {



    message (data){

        promise = axios.post('/api.public/contact/message',data);

        return promise;
    }



}
