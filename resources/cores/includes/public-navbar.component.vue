<template>
    <div>
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white custom-navbar">
                <div class="container">
                    <a class="navbar-brand" href="/"><img src="/images/logo.svg"></a>
                    <button class="custom-toggler navbar-toggler navbar-toggler-right" type="button">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="nav">
                        <ul class="navbar-nav ml-auto smooth">
                            <li class="nav-item">
                                <!--<a class="nav-link pl-4 active scroll" data-id="who" href="#who">Who We Are</a>-->

                                <router-link class="nav-link pl-4 active scroll" data-id="#who" :to="{name:'home'}"
                                             tag="a">Who We Are
                                </router-link>
                            </li>
                            <li class="nav-item">

                                <router-link class="nav-link pl-4 scroll" data-id="#vision" :to="{name:'home'}" tag="a">Our
                                    Vision
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link pl-4 scroll" data-id="#mission" :to="{name:'home'}" tag="a">
                                    Our Mission
                                </router-link>
                            </li>
                            <li class="nav-item">

                                <router-link class="nav-link pl-4 scroll" data-id="#team" :to="{name:'home'}" tag="a">Our
                                    Team
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link pl-4 scroll" data-id="#contact" :to="{name:'home'}" tag="a">
                                    Contact Us
                                </router-link>
                            </li>
                            <li class="nav-item">

                                <router-link class="nav-link pl-4" :to="{name:'career'}" tag="a">Careers</router-link>
                            </li>
                        </ul>

                    </div>

                </div>

            </nav>
            <div class="sub-nav navbar position-fixed  bg-dark-blue w-100 text-white"
                 v-if="$route.meta.group_name != 'donate' ">
                <div class="container text-center">
                    <span>Account No.: <strong class="mr-3">2279-7004948</strong></span>
                    <span>Account Name: <strong class="mr-3">Volunteers Against Poverty Foundation Inc.</strong></span>
                    <span>Bank Name: <strong class="mr-3">PHILIPPINE NATIONAL BANK</strong></span>
                    <a href="/donate" class="btn btn-white px-4 d-none btn-radius-20 font-weight-bold d-xl-block">Donate
                        Today</a>
                </div>
            </div>


            <nav id="mainMenu" class="main-sidebar">
                <div class="h-remaining sidebar-wrapper text-white">
                    <div class="row pt-5 h-70  text-right">
                        <div class="col-12">
                            <ul class="sidebar-list p-0 m-0 sidebar">


                                <li class="sidebar-item">

                                    <router-link class="sidebar-link h5 " data-id="#who" :to="{name:'home'}" tag="a">Who We Are</router-link>

                                </li>
                                <li class="sidebar-item">

                                    <router-link class="sidebar-link h5" data-id="#vision" :to="{name:'home'}" tag="a">Our Vision</router-link>
                                </li>
                                <li class="sidebar-item">
                                    <router-link class="sidebar-link h5" data-id="#mission" :to="{name:'home'}" tag="a">Our Mission</router-link>
                                </li>
                                <li class="sidebar-item">

                                    <router-link class="sidebar-link h5" data-id="#team" :to="{name:'home'}" tag="a">Our Team</router-link>
                                </li>
                                <li class="sidebar-item">

                                    <router-link class="sidebar-link h5" data-id="#contact" :to="{name:'home'}" tag="a">Contact Us</router-link>
                                </li>
                                <li class="sidebar-item">


                                    <a href="/career" class="sidebar-link h5">
                                        Careers
                                    </a>
                                </li>


                            </ul>
                        </div>

                    </div>

                    <!--<div class="row h-25  text-right">
                        <div class="col-12">
                            <ul class="sidebar-list p-0 m-0 sidebar">
                                <li class="sidebar-item"><small class="sidebar-link ">FOLLOW US ON FACEBOOK</small></li>
                                <li class="sidebar-item"><small class="sidebar-link ">PRIVACY</small></li>
                                <li class="sidebar-item"><small class="sidebar-link ">TERMS AND CONDITION</small></li>

                            </ul>
                        </div>

                    </div>-->

                </div>
            </nav>


        </header>
        <div id="overlay" class="overlay"></div>
    </div>
</template>

<script>
    export default {}
</script>


<style scoped>

</style>