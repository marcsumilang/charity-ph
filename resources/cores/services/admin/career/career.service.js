import axios from "axios";


var promise;


export default class CareerService {



    store(data) {

        promise = axios.post('/api.admin/careers', data);
        return promise;
    }

    update(data) {
        promise = axios.put('/api.admin/careers/' + data.id, data);
        return promise;
    }

    list(data) {

        promise = axios.get('/api.admin/careers', {params: data});
        return promise;
    }

    show(id) {
        promise = axios.get('/api.admin/careers/' + id);
        return promise;
    }

    delete(id) {
        promise = axios.delete('/api.admin/careers/' + id);
        return promise;
    }

}