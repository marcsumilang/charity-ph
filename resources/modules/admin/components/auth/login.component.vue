<template>
    <div class="container pt-5">
        <div class="row h-100 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12 pr-3">
                <input type="hidden" v-model="data._token">
                                    <div class="form-group">
                                        <label>Email Address*</label>
                                        <input type="email" v-model="data.email" class="form-control"
                                               placeholder="Email Address">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-3">

                                    <label>Password*</label>
                                    <input type="Password" v-model="data.password" class="form-control"
                                           placeholder="Password">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 pr-3">

                                    <div class="form-group  text-center">
                                        <button type="button" v-on:click="login()" class="btn btn-primary btn-fill">
                                            Login
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import AlertService from "../../../../cores/services/alert/alert.service";
    import AuthService from "../../../../cores/services/admin/auth/auth.service";

    const alertService = new AlertService();

    const authService = new AuthService();
    export default {
        data: function () {
            return {
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

            }
        },
        mounted: function () {

        },
        methods: {

            login: function () {

                return authService.login(this.data).then(success => {

                    var response = success.data;

                    localStorage.setItem('authAdmin', JSON.stringify(response.data));
                    this.$router.go({name:'dasboard'});

                }, fail => {
                    var errors = fail.response.data.errors;

                    Object.entries(errors).forEach(([key, value]) => {

                        alertService.errorWithMessage(value[0]);

                    });
                });
            }

        }
    }
</script>

<style scoped>

</style>