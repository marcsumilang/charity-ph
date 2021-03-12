import swal from 'sweetalert';

export default class AlertService {

    saved() {

        $.notifyClose();
        $.notify({
            icon: "fa fa-check-circle",
            message: "<b>Success</b> <br> Record Successfully Saved."

        }, {
            type: 'success',
            timer: 2000,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });


    }


    updated() {

        $.notifyClose();
        $.notify({
            icon: "nc-icon nc-check-2",
            message: "<b>Success</b> <br> Record Successfully Updated."

        }, {
            type: 'success',
            timer: 2000,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });


    }

    submitWithMessage(message) {

        $.notifyClose();
        $.notify({
            icon: "fa fa-check-circle",
            message: "<b>Success</b> <br> " + message

        }, {
            type: 'success',
            timer: 2000,
            placement: {
                from: 'top',
                align: 'center'
            }
        });


    }


    deleted() {


        $.notify({
            icon: "nc-icon nc-check-2",
            message: "<b>Success</b> <br> Record Successfully Deleted."

        }, {
            type: 'success',
            timer: 2000,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });


    }


    errorWithMessage(message) {


        $.notify({
            icon: "fa fa-times",
            message: "<b>Error</b> <br> " + message

        }, {
            type: 'danger',
            timer: 2000,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });


    }


    uploading() {


        $.notify({
            icon: "nc-icon nc-cloud-upload-94",
            message: "<b>Loading..</b> <br> Please Wait."

        }, {
            type: 'primary',
            allow_dismiss: false,
            timer: 800000,
            onClosed: null,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });


    }


    uploadSuccess() {


        $.notifyClose();


        setTimeout(function () {
            $.notify({
                icon: "nc-icon nc-check-2",
                message: "<b>Success</b> <br> File Successfully Uploaded."

            }, {
                type: 'success',
                timer: 2000,
                placement: {
                    from: 'bottom',
                    align: 'right'
                }
            });
        }, 800);

    }

    withConfirmation(cb, message) {

        swal({
            title: 'Are you sure?',
            text: message,
            dangerMode: true,
            icon: "warning",
            closeOnClickOutside: false,
            buttons: {
                cancel: true,
                confirm: "Confirm",
            }

        })
            .then(function (response) {
                if (response) {
                    cb();
                }

            });
    }


    swalWithMessage(cb, message) {

        swal({
            title: 'Session Expired.',
            text: message,
            dangerMode: true,
            icon: "warning",
            closeOnClickOutside: false,
            buttons: {
                cancel: false,
                confirm: "Confirm",
            }

        })
            .then(function (response) {
                if (response) {
                    cb();
                }

            });
    }


}