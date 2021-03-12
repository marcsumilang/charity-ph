<template>
    <div>
        <section id="donate" class="donate-section">
            <div class="container h-100">
                <h2 class="mb-5 text-center text-white">Donate</h2>
                <div class="row justify-content-around">
                    <div class="col-lg-6">
                        <h5 class="text-center mb-4">Online Payment</h5>
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <h6><strong>Enter your donation</strong></h6>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="amount" v-model="data.has_one_payment_record.total"
                                               placeholder="Amount"
                                               required>
                                    </div>
                                </div>
                            </div>


                            <h6><strong>Your Information</strong></h6>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name"
                                           v-model="data.first_name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name" v-model="data.last_name"
                                           required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="email" name="email" placeholder="Email Address"
                                           v-model="data.email_address" required>
                                </div>
                            </div>

                            <p><strong>Payment Information</strong></p>
                            <div class="row pl-3">
                          <div class="col-lg-6">
                                    <p>
                                        <input type="radio" class="radio" name="method" id="opt1" required
                                                v-model="data.has_one_payment_record.payment_method_id" :value="2" checked>
                                        <label for="opt1"><img src="/images/image2.png" alt=""></label>
                                    </p>
                                         <!--<div class="row">
                                        <div class="col-xs">
                                            <input type="radio" class="radio" name="method" required
                                                v-model="data.has_one_payment_record.payment_method_id" :value="2">
                                            <p></p>
                                        </div>
                                        <div class="col">
                                            <label><img src="/images/image2.png" alt=""></label>
                                        </div>
                                    </div>-->
                                </div> 
                                <div class="col-lg-6">
                                    <p>
                                        <input type="radio" class="radio" name="method" id="opt2" required
                                                v-model="data.has_one_payment_record.payment_method_id" :value="1">
                                        <label for="opt2"><span class="d-block ml-4"><strong>&nbsp;Bank Deposit</strong></span></label>
                                    </p>
                                    <!-- <div class="row">
                                        <div class="col-xs">
                                            <input type="radio" class="radio" name="method"
                                                   required
                                                   v-model="data.has_one_payment_record.payment_method_id" :value="1">
                                        </div>
                                        <div class="col">
                                            <label><img src="/images/image1.png" alt=""></label>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="submit mt-2 mb-5 text-center">
                                <button type="submit" class="btn-submit custom-button custom-button-lg">Process
                                    Payment
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-5">
                        <h5 class="text-center mb-4">Bank Deposit</h5>
                        <p>You may also donate through our bank account below. Any amount you donate will go a long way
                            to support our cause.</p>

                        <div class="accounts">
                            <p>Account No.: <strong>2279-7004948</strong></p>
                            <p>Account Name: <strong>Volunteers Against Poverty Foundation Inc.</strong></p>
                            <p>Bank Name: <strong>PHILIPPINE NATIONAL BANK</strong></p>
                        </div>

                        <p class="mt-4">Please email to us your name and your deposit confirmation slip to
                            admin@volunteersagainstpoverty.org.ph, We thank you for your generosity.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script src="./donate.component.js" ></script>

