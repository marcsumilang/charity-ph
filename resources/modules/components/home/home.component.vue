<template>
    <div>
        <section id="who" class="h-remaining primary-section text-white">
            <div class="container">
                <div class="row align-items-lg-center h-100 align-items-end pb-lg-0 pb-5">
                    <div class="col-lg-6">
                        <div class="article-object text-md-left  text-center">

                            <h4 class="pt-2 article-subtitle">
                                We help Filipinos to reach their full potential as citizens.
                            </h4>
                            <p class="pt-2 mb-4 article-content">The Volunteers Against Poverty Foundation Inc. is a
                                non-stock
                                and non-profit association based in the Philippines which engages in humanitarian
                                activities
                                needed to uplift the welfare, health, and economic conditions of underprivileged
                                Filipino
                                communities</p>
                            <a href="/donate" class="btn-transparent mt-2 px-5 btn-radius-20">Donate
                                Today</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <section class="bg-white text-white">
            <div class="row no-gutters align-items-center bg-dark-blue">

                <div id="vision" class="col-lg-3 img-object">
                    <div class=" h-100 ">
                        <img class="img-fluid w-100  img-fit-cover img-position-center" src="/images/vision.png">
                    </div>
                </div>

                <div class="col-lg-3 bg-dark-blue">
                    <div class="h-100 text-center px-4">
                        <h4 class="pt-2 article-subtitle">Our Vision</h4>
                        <p class="pt-2 article-content">Volunteers Against Poverty Foundation envisions a better
                            Philippines
                            in which every Filipino family achieves the right to survival through sustainable
                            humanitarian
                            programs.</p>
                    </div>
                </div>
                <div id="mission" class="col-lg-3 img-object">
                    <div class=" h-100 ">
                        <img class="img-fluid w-100  img-fit-cover img-position-center" src="/images/mission.png">
                    </div>
                </div>

                <div class="col-lg-3 bg-dark-blue">
                    <div class="h-100 text-center px-4">
                        <h4 class="pt-2 article-subtitle">Our Mission</h4>
                        <p class="pt-2 article-content">To spread the goodness in volunteerism and how it contributes a
                            significant development not only to the victims of poverty but to everyone who has a heart
                            to
                            give.</p>
                    </div>
                </div>

            </div>
        </section>

        <section class="bg-white text-dark" id="team">
            <div class="container p-lg-0 p-0 my-sm-4 my-0 text-center">
                <h4 class="mt-5 mb-lg-5 mb-0">Our Team</h4>
                <div class="row row-eq-height no-gutters my-lg-5 align-items-center">

                    <div class="col-lg-6 mb-lg-4 mb-0 order-lg-1 order-2 img-object">
                        <img class="img-fluid w-100 h-100 img-fit-cover img-position-center" src="/images/marcos.png">
                    </div>

                    <div class="col-lg-6 mb-2 mb-lg-4 mb-0 order-lg-2 order-1 m">
                        <div class=" h-100 p-lg-5 px-3 py-4">

                            <p class="h5 font-weight-normal">“Helping our fellow down-trodden country men
                                is a formidable challenge, but if someone will not take the lead, then let me take it,
                                as a
                                leader among our peers, to be the first among equals, and the best among its best.“</p>
                            <div class="h6 pt-3 m-0 font-weight-bold">Francis Leo A. Marcos</div>
                            <span>Chairman</span>


                        </div>
                    </div>
                    <!--
                    <div class="col-lg-6  order-lg-3 order-3">
                        <div class=" h-100 p-lg-5 px-3 py-4">
                            <p class="h5 font-weight-normal">“Helping all our poverty-stricken countrymen
                                is not an easy task, but if every generous heart will help to this end, no mater how
                                great
                                the mission is, it will surely be achieved.”</p>
                            <div class="h6 pt-3 m-0 font-weight-bold">Bernard Chong</div>
                            <span>President</span>
                        </div>
                    </div>

                    <div class="col-lg-6 order-lg-4  order-4 img-object">
                        <img class="img-fluid w-100 h-100 img-fit-cover img-position-center" src="/images/bren.png"/>
                    </div>
                    -->
                </div>
            </div>
        </section>

        <section id="contact" class="contact-section  text-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="pt-5 pb-5">
                            <!--                        <h3 class="text-center">GET IN TOUCH WITH US</h3>-->
                            <div class="text-center article-object">
                                <h4 class="pt-2 article-subtitle"> We’d like to hear from you
                                </h4>
                                <p class="article-content">Get in touch and stay up to date with what’s new </p>
                                <form @submit.prevent="message">
                                    <div class="form-group pt-2 pb-2">
                                        <input type="text" class="form-control" placeholder="NAME"
                                               v-model="contact.name" required>
                                    </div>
                                    <div class="form-group pt-2 pb-2">
                                        <input type="email" class="form-control" placeholder="EMAIL"
                                               v-model="contact.email_address" required>
                                    </div>
                                    <div class="form-group pt-2 pb-2">
                                        <textarea class="form-control" placeholder="MESSAGE"
                                                  v-model="contact.message" required></textarea>
                                    </div>

                                    <button type="submit" class="btn-submit custom-button custom-button-lg">Submit
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

    import ContactService from "../../../cores/services/contact/contact.service";
    import AlertService from "../../../cores/services/alert/alert.service";

    const contactService = new ContactService(),
        alertService = new AlertService();
    export default {
        data: function () {
            return {
                contact: {}
            }
        },
        mounted: function () {

        },
        methods: {
            message: function () {

                alertService.uploading();
                return contactService.message(this.contact).then(success => {
                    alertService.submitWithMessage('Thank you for contacting us. We will respond to you as soon as possible.');
                });

            }
        }

    }

</script>


<style scoped>

</style>
