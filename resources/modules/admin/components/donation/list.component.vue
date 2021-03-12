<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">{{$route.meta.title}}</h3>
                        </div>
                        <div class="col-md-6 text-right">


                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="text-right">
                                <admin-search-component @click-handler="search"/>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-bordered ml-lg-3 table-order-items">

                        <tr class="text-center thead-dark">

                            <th>Action</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Date</th>


                        </tr>

                        <tr v-for="(value,key) in data.data" :key="key">

                            <td class="text-center">
                                <a style="cursor: pointer;" class="text text-primary" @click="update(key)"> Update </a>
                                |
                                <a style="cursor: pointer;" @click="remove(value.id)" class="text text-danger">
                                    Delete </a>
                            </td>
                            <td>

                                <select class="form-control" v-model="value.has_one_payment_record.status_option_id">
                                    <option v-for="(status,key) in status_options" :value="status.id">{{status.name}}
                                    </option>
                                </select>
                            </td>
                            <td>{{value.first_name }} {{value.last_name}}</td>
                            <td>{{value.email_address}}</td>
                            <td>{{value.has_one_payment_record.payment_method.name}}</td>
                            <td>₱{{formatNumber(value.has_one_payment_record.total)}}</td>
                            <td>{{value.created_at}}</td>


                        </tr>

                    </table>
                    <paginate-component v-if="data.total / data.per_page > 1"
                                        :page-count="data.total / data.per_page"
                                        :page-range="3"
                                        :margin-pages="2"
                                        :click-handler="paginate"
                                        :prev-text="'Prev'"
                                        :next-text="'Next'"
                                        :container-class="'pagination pl-3'"
                                        :page-class="'page-item'"/>
                </div>
            </div>
        </div>
    </div>
</template>


<script>


    import AlertService from '../../../../cores/services/alert/alert.service';
    import PaginateComponent from 'vuejs-paginate';
    import AdminSearchComponent from '../../../../cores/includes/admin-search.component';
    import DonationService from "../../../../cores/services/admin/donation/donation.service";
    import ResourceService from "../../../../cores/services/resource/resource.service";

    const alertService = new AlertService(),
        cmsService = new DonationService(),
        resourceService = new ResourceService();

    export default {
        components: {AdminSearchComponent, PaginateComponent},
        data: function () {
            return {
                config: {},
                data: {},
                status_options: []
            }
        },
        mounted() {

            this.list(this.$route.query);

            this.initialize();

        },
        methods: {
            search: function (data) {
                this.list(data);
                this.$router.push({name: this.$route.name, query: data});
            },
            list: function (data) {

                return cmsService.list(data).then(success => {
                    var response = success.data;
                    this.data = response;
                });
            },

            update: function (key) {

                alertService.uploading();
                return cmsService.update(this.data.data[key]).then(success => {

                    alertService.updated();
                });

            },
            remove: function (id) {

                return cmsService.delete(id).then(success => {
                    alertService.deleted();
                    this.list(this.$route.query);
                })
            },
            paginate: function (page) {
                var data = {
                    page: page
                }
                if (this.$route.query.keyword) {
                    data.keyword = this.$route.query.keyword;
                }
                this.list(data);

                this.$router.push({name: this.$route.name, query: data});

            },
            initialize() {
                var response;
                var getStatusOptions = () => {
                    return new Promise((resolve, reject) => {
                        resourceService.getStatusOptions().then(success => {
                            response = success.data;
                            this.status_options = response;
                        });
                    });
                }

                getStatusOptions();
            }
        }
    }
</script>

<style scoped>

</style>