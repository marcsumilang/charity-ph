import axios from "axios";
import Config from "../../../configs/app.config";

var promise;


export default class UploadService {
    uploadImage(url, event) {

        console.log(event.target.files[0]);
        let data = new FormData();
        data.append('file', event.target.files[0]);
        let config = {
            header: {
                'Content-Type': 'image/png'
            }
        }


        promise = axios.post(Config.base_url + url, data, config);

        return promise;
    }

}