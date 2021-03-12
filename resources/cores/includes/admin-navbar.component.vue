<template>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class=" container-fluid  ">
            <a class="navbar-brand" href="#pablo"> Dashboard </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="nav navbar-nav mr-auto desktop-notification">

                    <!--<li class="dropdown nav-item desktop-notification">-->
                        <!--<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"  id="navbarNontifications">-->
                            <!--<i class="nc-icon nc-planet"></i>-->
                            <!--<span class="notification">{{notification.total_unread}}</span>-->
                            <!--<span class="d-lg-none">Notifications</span>-->
                        <!--</a>-->

                        <!--<div class="dropdown-menu wpx-500 desktop-notif" aria-labelledby="navbarNontifications">-->


                            <!--<a class="dropdown-item" v-for="(value,key) in notification.data" :key="key">{{value.message}}</a>-->

                        <!--</div>-->

                    <!--</li>-->

                </ul>
                <ul class="navbar-nav ml-auto">
                    <!--<li class="nav-item dropdown">-->
                    <!--<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"-->
                    <!--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--<span class="no-icon">Notification</span>-->
                    <!---->
                    <!--</a>-->
                    <!--<div v-for="(value,key) in notifs"  class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
                    <!--<a v-on:click="markRead" class="dropdown-item" href="#">{{value.data}}</a>-->
                    <!---->
                    <!--</div>-->
                    <!--</li>-->

                

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="no-icon">{{auth.name}}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">



                            <a class="dropdown-item" :href="config.base_url+config.prefix+'/logout'">Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
</template>


<script>
    import Config from "../../configs/app.config"
    import ResourceService from "../services/resource/resource.service";

    const resourceService = new ResourceService()
    const config = Config;


    export default {
        data: function () {
            return {
                config: {
                    prefix: config.admin_prefix,
                    base_url: config.base_url
                },
                auth: resourceService.getAuth(),
                notification: {}
            }
        },
        mounted() {


            this.initialize();
        },
        methods: {
            initialize() {

            }
        },
        watch: {
            $route(to, from) {

                this.initialize();
            }
        }

    }
</script>


<style scoped>

</style>