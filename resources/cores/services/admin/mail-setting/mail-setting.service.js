import axios from "axios";


var promise;


export default class MailSettingService {



    store(data) {

        promise = axios.post('/api.admin/mail-settings', data);
        return promise;
    }

    update(data) {
        promise = axios.put('/api.admin/mail-settings/' + data.id, data);
        return promise;
    }

    list(data) {

        promise = axios.get('/api.admin/mail-settings', {params: data});
        return promise;
    }

    show(id) {
        promise = axios.get('/api.admin/mail-settings/' + id);
        return promise;
    }

    delete(id) {
        promise = axios.delete('/api.admin/mail-settings/' + id);
        return promise;
    }

}