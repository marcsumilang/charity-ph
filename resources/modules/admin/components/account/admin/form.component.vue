<template>
    <div class="row">
        <div class="col-md-12">

            <form>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">{{$route.meta.title}}</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" v-on:click="$route.params.id ? update() : store() "
                                        class="btn btn-primary btn-fill">Submit
                                </button>

                                <router-link tag="a" :to="{ name: 'admin-list' }" class="btn btn-warning btn-fill">
                                    Close
                                </router-link>

                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab"
                                   aria-controls="main" aria-selected="true">Main</a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--<a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab"-->
                            <!--aria-controls="images" aria-selected="false">Images</a>-->
                            <!--</li>-->

                        </ul>

                        <div class="tab-content pt-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                                <div class="row">
                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input type="text" v-model="data.name" class="form-control"
                                                   placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input type="text" v-model="data.email" class="form-control"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Address*</label>
                                            <input type="text" v-model="data.address" class="form-control"
                                                   placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Contact Number*</label>
                                            <input type="text" v-model="data.contact_number" class="form-control"
                                                   placeholder="Contact number">
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Password*</label>
                                            <input type="password" v-model="data.password" class="form-control"
                                                   placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Password Confirmation*</label>
                                            <input type="password" v-model="data.password_confirmation"
                                                   class="form-control" placeholder="Password Confirmation">
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>


                        <div class="clearfix"></div>

                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>


    import AlertService from '../../../../../cores/services/alert/alert.service';
    import Config from '../../../../../configs/app.config';
    import AdminService from "../../../../../cores/services/admin/account/admin/admin.service";
    import ResourceService from "../../../../../cores/services/resource/resource.service";


    const config = Config;

    const alertService = new AlertService();

    const cmsService = new AdminService();
    const resourceService = new ResourceService();

    export default {
        data: function () {
            return {
                data: {},

                config: {
                    base_url: config.base_url,

                }
            }
        },
        mounted: function () {

            if (this.$route.params.id) {


                this.show(this.$route.params.id);
            }
        },
        methods: {



            store: function () {

                return cmsService.store(this.data).then(success => {
                    alertService.saved();
                    this.data = {};
                }, fail => {
                    var errors = fail.response.data.errors;
                    $.notifyClose();
                    Object.entries(errors).forEach(([key, value]) => {

                        alertService.errorWithMessage(value[0]);

                    });
                });

            },
            update: function () {


                return cmsService.update(this.data).then(success => {
                    alertService.updated();
                }, fail => {
                    var errors = fail.response.data.errors;
                    $.notifyClose();
                    Object.entries(errors).forEach(([key, value]) => {

                        alertService.errorWithMessage(value[0]);

                    });
                });

            },
            show(id) {

                return cmsService.show(id).then(success => {

                    var response = success.data;
                    this.data = response;

                }, fail => {

                });

            },

        }
    }
</script>

<style scoped>

</style>