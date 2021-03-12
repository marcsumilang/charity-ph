import PayPalService from "../../../cores/services/paypal/paypal.service";
import DonateService from "../../../cores/services/donate/donate.service";
import AlertService from "../../../cores/services/alert/alert.service";

const payPalService = new PayPalService(),
    donateService = new DonateService(),
    alertService = new AlertService();
export default {
    data: function () {
        return {

            data: {
                has_one_payment_record: {}
            }
        }
    },
    mounted: function () {


    },
    methods: {

        async submit() {


            alertService.uploading();

            return donateService.donate(this.data).then(success => {
                var response = success.data;

                this.data = response;

                if (this.data.has_one_payment_record.payment_method_id == 2) {

                    const paypal = {
                        return_url: location.origin + '/api.public/checkout/payment/paypal/execute?payment_record_id=' + this.data.has_one_payment_record.id + '&client_url=' + location.origin + '/api.public/checkout/donates/' + this.data.id,
                        cancel_url: location.origin + '/payment/cancelled',
                        description: 'Donated by ' + this.data.first_name + ' ' + this.data.last_name + ' - Volunteers Against Poverty Foundation',
                        intent: 'sale',
                        items: [
                            {
                                name: 'Charity', price: this.data.has_one_payment_record.total, quantity: 1
                            }
                        ],
                        currency: 'PHP',
                        total: this.data.has_one_payment_record.total

                    };

                    payPalService.checkout(paypal).then(success => {
                        var response = success.data;
                        location.href = response.redirect_url;
                    });

                }
                else{
                    $.notifyClose();
                    this.$router.push({name: 'payment-deposit'});
                }

            });


        }
    }
}
