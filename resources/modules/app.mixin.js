import AlertService from "../cores/services/alert/alert.service";

const alertService = new AlertService();
export default {
    data: function () {
        return {};
    },
    methods: {

        formatDate(date) {

            return moment(date).format('YYYY-MM-DD');
        },
        asQueryParams(data) {
            const searchParams = new URLSearchParams();
            const search = data;
            Object.keys(search).forEach(key => searchParams.append(key, search[key]));

            return "?" + searchParams.toString();
        },

        formatNumber(data) {

            var number = Math.round(parseFloat(data) * 100) / 100;

            number = number.toFixed(2);
            return   number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        },
        popErrors(errors) {
            $.notifyClose();
            Object.entries(errors).forEach(([key, value]) => {

                alertService.errorWithMessage(value[0]);

            });
        }

    }
};
