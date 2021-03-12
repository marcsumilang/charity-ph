import axios from "axios";


var promise;


export default class DonationService {



    store(data) {

        promise = axios.post('/api.admin/donations', data);
        return promise;
    }

    update(data) {
        promise = axios.put('/api.admin/donations/' + data.id, data);
        return promise;
    }

    list(data) {

        promise = axios.get('/api.admin/donations', {params: data});
        return promise;
    }

    show(id) {
        promise = axios.get('/api.admin/donations/' + id);
        return promise;
    }

    delete(id) {
        promise = axios.delete('/api.admin/donations/' + id);
        return promise;
    }

}