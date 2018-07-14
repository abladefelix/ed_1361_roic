<template>
  <div class="container">
    <Header/>
    <div class="app-body">
      <div class="sec-orders">
        <Navigation/>
        <div class="app-title">KYC Verification</div>
        <div class="pr-central-body">

          <!-- Section: KYC Verification -->
          <div class="kyc-steps">
            <div class="row">
              <div class="col col-md-4">
                <div class="kyc-step" v-bind:class="{'done':kyc_step}">1. Address</div>
              </div>
              <div class="col col-md-4">
                <div class="kyc-step" v-bind:class="{'done':kyc_step==2||kyc_step==3}">2. Personal Details</div>
              </div>
              <div class="col col-md-4">
                <div class="kyc-step" v-bind:class="{'done3':kyc_step==3}">3. Identity Verification</div>
              </div>
            </div>
          </div>

          <!-- KYC Step 1 -->
          <div class="kyc-step-1" v-if="kyc_step == 1">
            <h2>Address</h2>
            <div class="form-group">
              <label>Address Line 1*</label>
              <input type="text" class="form-control" id="address_line_1" name="address_line_1" v-model="form.address_line_1" v-bind:class="{'inpt-error':error.address_line_1}" v-on:click="error.address_line_1 = 0" v-on:keyup="form_status = ''">
            </div>
            <div class="form-group">
              <label>Address Line 2</label>
              <input type="text" class="form-control" id="address_line_2" name="address_line_2" v-model="form.address_line_2" v-bind:class="{'inpt-error':error.address_line_2}" v-on:click="error.address_line_2 = 0" v-on:keyup="form_status = ''">
            </div>
            <div class="form-group">
              <label>City*</label>
              <input type="text" class="form-control" id="city" name="city" v-model="form.city" v-bind:class="{'inpt-error':error.city}" v-on:click="error.city = 0" v-on:keyup="form_status = ''">
            </div>
            <div class="row">
              <div class="col col-md-6">
                <div class="form-group">
                  <label>Country*</label>
                  <input type="text" class="form-control" id="country" name="country" v-model="form.country" v-bind:class="{'inpt-error':error.country}" v-on:click="error.country = 0" v-on:keyup="form_status = ''">
                </div>
              </div>
              <div class="col col-md-6">
                <div class="form-group">
                  <label>Region/State*</label>
                  <input type="text" class="form-control" id="region_state" name="region_state" v-model="form.region_state" v-bind:class="{'inpt-error':error.region_state}" v-on:click="error.region_state = 0" v-on:keyup="form_status = ''">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-12">
                <div class="form-group">
                  <label>Postal Code*</label>
                  <input type="text" class="form-control" id="postal_code" name="postal_code" v-model="form.postal_code" v-bind:class="{'inpt-error':error.postal_code}" v-on:click="error.postal_code = 0" v-on:keyup="form_status = ''">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div v-if="form_status == 'empty_fields'" class="kyc-step-error-msg">Please fill in all required fields</div>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-6"></div>
              <div class="col col-md-6 text-right">
                <div class="form-group">
                  <div class="btn btn-gold" v-on:click="step2">Next</div>
                </div>
              </div>
            </div>
          </div>
          <!-- KYC Step 1 -->

          <!-- KYC Step 2 -->
          <div class="kyc-step-2" v-if="kyc_step == 2">
            <h2>Personal Details</h2>
            <div class="form-group">
              <label>Country of Birth*</label>
              <input type="text" class="form-control" id="county_of_birth" name="county_of_birth" v-model="form.county_of_birth" v-bind:class="{'inpt-error':error.county_of_birth}" v-on:click="error.county_of_birth = 0" v-on:keyup="form_status_2 = ''">
            </div>
            <div class="form-group">
              <label>Nationality*</label>
              <input type="text" class="form-control" id="nationality" name="nationality" v-model="form.nationality" v-bind:class="{'inpt-error':error.nationality}" v-on:click="error.nationality = 0" v-on:keyup="form_status_2 = ''">
            </div>
            <div class="form-group">
              <label>Occupation*</label>
              <input type="text" class="form-control" id="occupation" name="occupation" v-model="form.occupation" v-bind:class="{'inpt-error':error.occupation}" v-on:click="error.occupation = 0" v-on:keyup="form_status_2 = ''">
            </div>
            <div class="form-group">
              <label>Source of Funds*</label>
              <input type="text" class="form-control" id="source_of_funds" name="source_of_funds" v-model="form.source_of_funds" v-bind:class="{'inpt-error':error.source_of_funds}" v-on:click="error.source_of_funds = 0" v-on:keyup="form_status_2 = ''">
            </div>
            <div class="form-group">
              <label>Estimated Investment(USD)*</label>
              <input type="text" class="form-control" id="est_inv" name="est_inv" v-model="form.est_inv" v-bind:class="{'inpt-error':error.est_inv}" v-on:click="error.est_inv = 0" v-on:keyup="form_status_2 = ''">
            </div>
            <div class="row">
              <div class="col-md-12">
                <div v-if="form_status_2 == 'empty_fields'" class="kyc-step-error-msg">Please fill in all required fields</div>
              </div>
            </div>
            <div class="row">
              <div class="col col-md-6 text-left">
                <div class="form-group">
                  <div class="btn btn-black" v-on:click="kyc_step = 1">Previous</div>
                </div>
              </div>
              <div class="col col-md-6 text-right">
                <div class="form-group">
                  <div class="btn btn-gold" v-on:click="step3">Next</div>
                </div>
              </div>
            </div>
          </div>
          <!-- KYC Step 2 -->

          <!-- KYC Step 3 -->
          <div class="kyc-step-3" v-if="kyc_step == 3">
            <iframe class="kyc-iframe" src="" height="570" width="100%"></iframe>
            <div class="row">
              <div class="col col-md-12 text-center">
                <div class="form-group">
                  <div class="btn btn-black" v-on:click="kyc_step = 2">Previous</div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../elements/user_head.vue'
import Navigation from '../elements/user_navigation.vue'
export default {
  data() {
    return {
      api_url:'https://api.airtable.com/v0/appypnEUzIAKDEFKv',
      api_key:'keyPe8dzyWqbibsVi',
      section:'orders',
      user_id:83,
      user:[],
      orders:[],
      informations:[],
      kyc_step:1,
      form:{
        address_line_1:'',
        address_line_2:'',
        city:'',
        country:'',
        region_state:'',
        postal_code:'',
        county_of_birth:'',
        nationality:'',
        occupation:'',
        source_of_funds:'',
        est_inv:''
      },
      form_status:0,
      form_status_2:0,
      error:{
        address_line_1:0,
        address_line_2:0,
        city:0,
        country:0,
        region_state:0,
        postal_code:0,
        county_of_birth:0,
        nationality:0,
        occupation:0,
        source_of_funds:0,
        est_inv:0
      },
      set_status:'',
      set_error:{
        address_line_1:0,
        address_line_2:0,
        city:0,
        country:0,
        region_state:0,
        postal_code:0,
        county_of_birth:0,
        nationality:0,
        occupation:0,
        source_of_funds:0,
        est_inv:0
      }
    }
  },
  created() {

  },
  methods: {
    step2() {
			var vm = this;
			if (vm.form.address_line_1 == '') {vm.error.address_line_1 = 1;}
			if (vm.form.city == '') {vm.error.city = 1;}
			if (vm.form.country == '') {vm.error.country = 1;}
			if (vm.form.region_state == '') {vm.error.region_state = 1;}
			if (vm.form.postal_code == '') {vm.error.postal_code = 1;}

			if (vm.form.address_line_1 == '' || vm.form.city == '' || vm.form.country == '' || vm.form.region_state == '' || vm.form.postal_code == '') {
				vm.form_status = 'empty_fields';
			} else {
				vm.kyc_step = 2;
			}
		},
		step3() {
			var vm = this;
			if (vm.form.county_of_birth == '') {vm.error.county_of_birth = 1;}
			if (vm.form.nationality == '') {vm.error.nationality = 1;}
			if (vm.form.occupation == '') {vm.error.occupation = 1;}
			if (vm.form.source_of_funds == '') {vm.error.source_of_funds = 1;}
			if (vm.form.est_inv == '') {vm.error.est_inv = 1;}

			if (vm.form.county_of_birth == '' || vm.form.nationality == '' || vm.form.occupation == '' || vm.form.source_of_funds == '' || vm.form.est_inv == '') {
				vm.form_status_2 = 'empty_fields';
			} else {
				vm.kyc_step = 3;
			}
		}
  },
  components: {
    Header,
    Navigation
  }
}
</script>
