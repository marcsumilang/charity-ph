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

                            <router-link tag="a" :to="$route.path  + '/create'" class="btn btn-primary">
                                Create Career

                            </router-link>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>


                        </tr>

                        <tr v-for="(value,key) in data.data" :key="key">

                            <td class="text-center">

                                <a style="cursor: pointer;" @click="remove(value.id)" class="text text-danger">
                                    Delete </a>
                            </td>
                            <td>{{value.name}}</td>
                            <td>{{value.email_address}}</td>
                            <td>{{value.message}}</td>


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
    import ContactService from "../../../../cores/services/admin/contact/contact.service";

    const alertService = new AlertService(),
        cmsService = new ContactService();

    export default {
        components: {AdminSearchComponent, PaginateComponent},
        data: function () {
            return {
                config: {},
                data: {}
            }
        },
        mounted() {

            this.list(this.$route.query);


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
        }
    }
</script>

<style scoped>

</style>