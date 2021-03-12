<template>
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">

            <!--<img src="/images/logo_white.png" alt="Lightforce" class="img-fluid px-3 pb-3 mb-4">-->

            <a class="simple-text font-bold">Charity</a>
        </div>
        <ul class="nav">
            <!--v-if="validateRole('Dashboard')"-->
            <router-link tag="li" exact-active-class="active" :to="{name: 'dashboard' }" exact >
                <a class="nav-link" href="">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p>Dashboard</p>
                </a>

            </router-link>




            <router-link tag="li" :to="{ name: 'donation-list' }"
                         :class="{'active' : $route.meta.navigation.parent == 'donations'}">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Donations</p>
                </a>

            </router-link>


            <router-link tag="li" :to="{name: 'career-list' }"  :class="{'active' : $route.meta.navigation.parent == 'careers'}">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p>Career</p>
                </a>

            </router-link>


            <router-link tag="li" :to="{name: 'inquiry-list' }"  :class="{'active' : $route.meta.navigation.parent == 'inquiries'}">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-chat-round"></i>
                    <p>Inquiries</p>
                </a>

            </router-link>

            <router-link tag="li" :to="{name: 'mail-setting-list' }"  :class="{'active' : $route.meta.navigation.parent == 'mail-setting'}">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-email-83"></i>
                    <p>Mail Settings</p>
                </a>

            </router-link>


            <li data-toggle="collapse" data-target="#account" class="collapsed"
                :class="{'active' : $route.meta.navigation.parent == 'account'}">
                <a class="nav-link" href="#">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Accounts</p>
                    <span class=" pull-right"><i class="nc-icon nc-stre-down"></i></span>
                </a>
                <ul class="sub-menu collapse" id="account">




                    <router-link tag="li" :to="{ name: 'admin-list' }"
                                 :class="{'active' : $route.meta.navigation.child == 'admins'}">
                        <a class="sub-link">
                            <i class="nc-icon nc-simple-delete"></i>
                            <p>Admins</p>
                        </a>
                    </router-link>




                </ul>

            </li>





        </ul>
    </div>

</template>

<script>
    import Config from "../../configs/app.config"

    const config = Config;
    export default {
        data: function () {
            return {
                config: {
                    prefix: config.admin_prefix,
                    route_list_parent: this.$route.meta.list_parent,
                    route_list_child: this.$route.meta.list_child
                }
            }
        },
        mounted() {


        },
        methods: {

            validateRole: function (value) {
                const authRoles = JSON.parse(auth.admin_role.roles);

                const found = authRoles.some(el => el == value);

                if (found) {

                    return true;
                }
                return false;

            }
        },
        watch: {
            $route(to, from) {

                this.config.route_list_parent = to.meta.list_parent;
                this.config.route_list_child = to.meta.list_child;
            }
        }
    }
</script>
