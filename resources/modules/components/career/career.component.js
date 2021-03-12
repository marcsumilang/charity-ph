import CareerService from "../../../cores/services/career/career.service";
import AlertService from "../../../cores/services/alert/alert.service";


const careerService = new CareerService(),
    alertService = new AlertService();
export default {
    data: function () {
        return {
            form_data: new FormData,
            data: {},
            jobs: []
        }
    },
    mounted: function () {


        this.initialize();

    },
    methods: {
        async submit() {

            alertService.uploading();
            Object.entries(this.data).forEach(([key, value]) => {
                this.form_data.append(key,value);
            });


            return careerService.apply(this.form_data).then(success => {
                alertService.submitWithMessage('Application received. Shortlisted applicants will be contacted by our team to continue the recruitment process');
                this.data = {};
            });

        },

        uploadResume: function ($event) {

            this.form_data.append('resume', $event.target.files[0]);


        },

        initialize() {

            var response;
            var getJobs = () => {
                return new Promise((resolve, reject) => {
                    careerService.jobs().then(success => {
                        response = success.data;

                        this.jobs = response;
                    });
                });
            }

            getJobs();
        }
    }
}
