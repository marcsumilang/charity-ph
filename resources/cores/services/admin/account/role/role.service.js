import axios from "axios";
import Config from "../../../../../configs/app.config";

var promise;


export default class RoleService {



    store(data) {

        promise = axios.post(Config.base_url + '/api.admin/admin-roles', data);
        return promise;
    }

    update(data) {
        promise = axios.put(Config.base_url + '/api.admin/admin-roles/' + data.id, data);
        return promise;
    }

    list(data) {

        promise = axios.get(Config.base_url + '/api.admin/admin-roles', {params: data});
        return promise;
    }

    show(id) {
        promise = axios.get(Config.base_url + '/api.admin/admin-roles/' + id);
        return promise;
    }

    delete(id) {
        promise = axios.delete(Config.base_url + '/api.admin/admin-roles/' + id);
        return promise;
    }

}