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

                                <router-link tag="a" :to="{ name: 'mail-setting-list' }"
                                             class="btn btn-warning btn-fill">
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
                                    <div class="col-md-12 pr-3">
                                        <div class="form-group">
                                            <label>Type*</label>
                                            <select v-model="data.mail_option_id" class="form-control" disabled>
                                                <option v-for="(value,key) in mail_options" :value="value.id">
                                                    {{value.name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 pr-3">
                                        <div class="form-group">
                                            <label>Email Receiver*</label>
                                            <input type="text" v-model="data.to" class="form-control"
                                                   placeholder="Please input email that will receive form...">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6 pr-3">
                                        <div class="form-group">
                                            <label>Email Sender*</label>
                                            <input type="text" v-model="data.from" class="form-control"
                                                   placeholder="Please input a valid email...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sender Name*</label>
                                            <input type="text" v-model="data.from_sender" class="form-control"
                                                   placeholder="Please input name of sender...">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 pr-3">
                                        <div class="form-group">
                                            <label>CC (One valid email per line)</label>
                                            <a class="pull-right font-bold text-primary" style="cursor: pointer;"
                                               @click="addCc"><i class="fa fa-plus-circle"></i> ADD MORE CC </a>
                                        </div>
                                        <template v-for="(value,key) in data.cc">
                                            <div class="row mb-3">
                                                <div class="col-md-9 pr-3">
                                                    <input type="email" class="form-control" v-model="data.cc[key]">
                                                </div>
                                                <div class="col-md-3">
                                                    <a class="btn btn-danger btn-block text-danger" style="cursor: pointer;" @click="removeCc(key)">
                                                        <i class="fa fa-remove"></i>    REMOVE
                                                    </a>
                                                </div>
                                            </div>
                                        </template>
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


    import AlertService from '../../../../cores/services/alert/alert.service';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import Config from '../../../../configs/app.config';
    import MailSettingService from "../../../../cores/services/admin/mail-setting/mail-setting.service";
    import ResourceService from "../../../../cores/services/resource/resource.service";


    const config = Config,
        alertService = new AlertService(),
        cmsService = new MailSettingService(),
        resourceService = new ResourceService();

    export default {
        data: function () {
            return {
                editor: ClassicEditor,

                data: {
                    cc: []
                },
                mail_options: [],
                config: {
                    base_url: config.base_url,

                }
            }
        },
        mounted: function () {

            this.initialize();

            if (this.$route.params.id) {


                this.show(this.$route.params.id);
            }
        },
        methods: {

            addCc: function () {
                this.data.cc.push('');
            },
            removeCc: function (key) {
                this.$delete(this.data.cc, key);
            },
            store: function () {

                return cmsService.store(this.data).then(success => {
                    alertService.saved();
                    this.data = {
                        cc: []
                    };
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
            initialize() {
                var response;
                var getMailOptions = () => {
                    return new Promise((resolve, reject) => {
                        resourceService.getMailOptions().then(success => {
                            response = success.data;
                            this.mail_options = response;
                        });
                    });
                }

                getMailOptions();
            }

        }
    }
</script>

<style scoped>

</style>