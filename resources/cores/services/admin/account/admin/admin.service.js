import axios from "axios";
import Config from "../../../../../configs/app.config";

var promise;


export default class AdminService {



    store(data) {

        promise = axios.post('/api.admin/admins', data);
        return promise;
    }

    update(data) {
        promise = axios.put('/api.admin/admins/' + data.id, data);
        return promise;
    }

    list(data) {

        promise = axios.get('/api.admin/admins', {params: data});
        return promise;
    }

    show(id) {
        promise = axios.get('/api.admin/admins/' + id);
        return promise;
    }

    delete(id) {
        promise = axios.delete('/api.admin/admins/' + id);
        return promise;
    }

}