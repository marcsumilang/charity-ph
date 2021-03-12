import axios from "axios";

var promise;


export default class CareerService {



    apply (data){

        promise = axios.post('/api.public/career/apply',data);

        return promise;
    }



    jobs (){

        promise = axios.get('/api.public/career/jobs');

        return promise;
    }



}
