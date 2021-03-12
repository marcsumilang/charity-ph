<template>
    <div>
        <section id="careers" class="bg-white primary-section text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="career-block">
                            <h1 class="mb-4">Available Careers</h1>

                            <div class="block mb-3" v-for="(value,key) in jobs">
                                <h3>{{value.name}}</h3>
                                <p v-html="value.description"></p>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="career-block bg-dark-blue px-4 py-4 mb-5">
                            <h2>Interested?</h2>
                            <p>Send a little something about yourself to careers@volunteersagainstpoverty.org.ph with links to your work or fill out the form below.</p>
                            <form @submit.prevent="submit">
                                <div class="form-group pt-2 pb-2">
                                    <select class="form-control custom-form-control" v-model="data.job" required>
                                        <option v-for="(value,key) in jobs" :value="value.name">{{value.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group pt-2 pb-2">
                                    <input type="text" class="form-control custom-form-control" placeholder="Name" v-model="data.name" required>
                                </div>
                                <div class="form-group pt-2 pb-2">
                                    <input type="number" class="form-control custom-form-control" placeholder="Contact Number" v-model="data.contact_number">
                                </div>
                                <div class="form-group pt-2 pb-2">
                                    <input type="email" class="form-control custom-form-control" placeholder="Email" v-model="data.email_address">
                                </div>
                                <div class="form-group pt-3 pb-3">
                                    <span class="file-info pr-5">Upload CV</span>
                                    <input type="file" id="real-input" @change="uploadResume">
                                </div>

                                <button type="submit"class=" btn-transparent btn-radius-20 font-weight-bold custom-button custom-button-lg">Send
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script src="./career.component.js" ></script>

<style scoped>

</style>