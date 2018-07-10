<template>
  <div class="container">
    <div class="sec-orders">
      <Header/>
      <div class="app-body">
        <Navigation/>
        <div class="app-title">Settings</div>
        <div class="well">
          <div class="row u-settings-body">
            <div class="col col-md-4">
              <div class="form-group">
                <label><strong>E-Mail</strong></label>
                <input type="text" class="form-control" v-model="user.email" v-bind:class="{'inpt-error':set_error.email}" v-on:click="set_error.email = 0" v-on:keyup="set_status = ''" disabled>
              </div>
              <div class="form-group">
                <label><strong>Your Name</strong></label>
                <input type="text" class="form-control" id="set_name" name="set_name" v-model="user.username" v-bind:class="{'inpt-error':set_error.name}" v-on:click="set_error.name = 0" v-on:keyup="set_status = ''">
              </div>
              <div class="form-group">
                <label><strong>Phone</strong></label>
                <input type="text" class="form-control" id="set_phone" name="set_phone" v-model="user.phone" v-bind:class="{'inpt-error':set_error.phone}" v-on:click="set_error.phone = 0" v-on:keyup="set_status = ''">
              </div>
            </div>
            <div class="col col-md-8">
              <div class="form-group">
                <div class="row">
                  <div class="col col-md-6">
                    <label>Firstname</label>
                    <input type="text" class="form-control" id="set_firstname" name="set_firstname" v-model="user.firstname" v-bind:class="{'inpt-error':set_error.postal_code}" v-on:click="set_error.postal_code = 0" v-on:keyup="set_status = ''">
                  </div>
                  <div class="col col-md-6">
                    <label>Lastname</label>
                    <input type="text" class="form-control" id="set_lastname" name="set_lastname" v-model="user.lastname" v-bind:class="{'inpt-error':set_error.postal_code}" v-on:click="set_error.postal_code = 0" v-on:keyup="set_status = ''">
                  </div>
                </div>
                <div class="row">
                  <div class="col col-md-12">
                    <label><strong>Address</strong></label>
                    <div><label>Street</label></div>
                    <input type="text" class="form-control address-field" id="set_address_line_1" name="set_address_line_1" v-model="user.address" v-bind:class="{'inpt-error':set_error.address_line_1}" v-on:click="set_error.address_line_1 = 0" v-on:keyup="set_status = ''">
                  </div>
                </div>
                <div class="row address-field">
                  <div class="col col-md-3">
                    <label>Postal Code</label>
                    <input type="text" class="form-control" id="set_postal_code" name="set_postal_code" v-model="user.zip" v-bind:class="{'inpt-error':set_error.postal_code}" v-on:click="set_error.postal_code = 0" v-on:keyup="set_status = ''">
                  </div>
                  <div class="col col-md-9">
                    <label>City</label>
                    <input type="text" class="form-control" id="set_city" name="set_city" v-model="user.city" v-bind:class="{'inpt-error':set_error.city}" v-on:click="set_error.city = 0" v-on:keyup="set_status = ''">
                  </div>
                </div>
                <div class="row address-field">
                  <div class="col col-md-5">
                    <label>Region/State</label>
                    <input type="text" class="form-control" id="set_region_state" name="set_region_state" v-model="user.state" v-bind:class="{'inpt-error':set_error.region_state}" v-on:click="set_error.region_state = 0" v-on:keyup="set_status = ''">
                  </div>
                  <div class="col col-md-7">
                    <label>Country</label>
                    <select class="form-control" id="set_country" name="set_country" v-model="user.country_code" v-bind:class="{'inpt-error':set_error.country_code}" v-on:click="set_error.country_code = 0" v-on:keyup="set_status = ''">
                      <option value="AF">Afghanistan</option>
                      <option value="AX">Åland Islands</option>
                      <option value="AL">Albania</option>
                      <option value="DZ">Algeria</option>
                      <option value="AS">American Samoa</option>
                      <option value="AD">Andorra</option>
                      <option value="AO">Angola</option>
                      <option value="AI">Anguilla</option>
                      <option value="AQ">Antarctica</option>
                      <option value="AG">Antigua and Barbuda</option>
                      <option value="AR">Argentina</option>
                      <option value="AM">Armenia</option>
                      <option value="AW">Aruba</option>
                      <option value="AU">Australia</option>
                      <option value="AT">Austria</option>
                      <option value="AZ">Azerbaijan</option>
                      <option value="BS">Bahamas</option>
                      <option value="BH">Bahrain</option>
                      <option value="BD">Bangladesh</option>
                      <option value="BB">Barbados</option>
                      <option value="BY">Belarus</option>
                      <option value="BE">Belgium</option>
                      <option value="BZ">Belize</option>
                      <option value="BJ">Benin</option>
                      <option value="BM">Bermuda</option>
                      <option value="BT">Bhutan</option>
                      <option value="BO">Bolivia, Plurinational State of</option>
                      <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                      <option value="BA">Bosnia and Herzegovina</option>
                      <option value="BW">Botswana</option>
                      <option value="BV">Bouvet Island</option>
                      <option value="BR">Brazil</option>
                      <option value="IO">British Indian Ocean Territory</option>
                      <option value="BN">Brunei Darussalam</option>
                      <option value="BG">Bulgaria</option>
                      <option value="BF">Burkina Faso</option>
                      <option value="BI">Burundi</option>
                      <option value="KH">Cambodia</option>
                      <option value="CM">Cameroon</option>
                      <option value="CA">Canada</option>
                      <option value="CV">Cape Verde</option>
                      <option value="KY">Cayman Islands</option>
                      <option value="CF">Central African Republic</option>
                      <option value="TD">Chad</option>
                      <option value="CL">Chile</option>
                      <option value="CN">China</option>
                      <option value="CX">Christmas Island</option>
                      <option value="CC">Cocos (Keeling) Islands</option>
                      <option value="CO">Colombia</option>
                      <option value="KM">Comoros</option>
                      <option value="CG">Congo</option>
                      <option value="CD">Congo, the Democratic Republic of the</option>
                      <option value="CK">Cook Islands</option>
                      <option value="CR">Costa Rica</option>
                      <option value="CI">Côte d'Ivoire</option>
                      <option value="HR">Croatia</option>
                      <option value="CU">Cuba</option>
                      <option value="CW">Curaçao</option>
                      <option value="CY">Cyprus</option>
                      <option value="CZ">Czech Republic</option>
                      <option value="DK">Denmark</option>
                      <option value="DJ">Djibouti</option>
                      <option value="DM">Dominica</option>
                      <option value="DO">Dominican Republic</option>
                      <option value="EC">Ecuador</option>
                      <option value="EG">Egypt</option>
                      <option value="SV">El Salvador</option>
                      <option value="GQ">Equatorial Guinea</option>
                      <option value="ER">Eritrea</option>
                      <option value="EE">Estonia</option>
                      <option value="ET">Ethiopia</option>
                      <option value="FK">Falkland Islands (Malvinas)</option>
                      <option value="FO">Faroe Islands</option>
                      <option value="FJ">Fiji</option>
                      <option value="FI">Finland</option>
                      <option value="FR">France</option>
                      <option value="GF">French Guiana</option>
                      <option value="PF">French Polynesia</option>
                      <option value="TF">French Southern Territories</option>
                      <option value="GA">Gabon</option>
                      <option value="GM">Gambia</option>
                      <option value="GE">Georgia</option>
                      <option value="DE">Germany</option>
                      <option value="GH">Ghana</option>
                      <option value="GI">Gibraltar</option>
                      <option value="GR">Greece</option>
                      <option value="GL">Greenland</option>
                      <option value="GD">Grenada</option>
                      <option value="GP">Guadeloupe</option>
                      <option value="GU">Guam</option>
                      <option value="GT">Guatemala</option>
                      <option value="GG">Guernsey</option>
                      <option value="GN">Guinea</option>
                      <option value="GW">Guinea-Bissau</option>
                      <option value="GY">Guyana</option>
                      <option value="HT">Haiti</option>
                      <option value="HM">Heard Island and McDonald Islands</option>
                      <option value="VA">Holy See (Vatican City State)</option>
                      <option value="HN">Honduras</option>
                      <option value="HK">Hong Kong</option>
                      <option value="HU">Hungary</option>
                      <option value="IS">Iceland</option>
                      <option value="IN">India</option>
                      <option value="ID">Indonesia</option>
                      <option value="IR">Iran, Islamic Republic of</option>
                      <option value="IQ">Iraq</option>
                      <option value="IE">Ireland</option>
                      <option value="IM">Isle of Man</option>
                      <option value="IL">Israel</option>
                      <option value="IT">Italy</option>
                      <option value="JM">Jamaica</option>
                      <option value="JP">Japan</option>
                      <option value="JE">Jersey</option>
                      <option value="JO">Jordan</option>
                      <option value="KZ">Kazakhstan</option>
                      <option value="KE">Kenya</option>
                      <option value="KI">Kiribati</option>
                      <option value="KP">Korea, Democratic People's Republic of</option>
                      <option value="KR">Korea, Republic of</option>
                      <option value="KW">Kuwait</option>
                      <option value="KG">Kyrgyzstan</option>
                      <option value="LA">Lao People's Democratic Republic</option>
                      <option value="LV">Latvia</option>
                      <option value="LB">Lebanon</option>
                      <option value="LS">Lesotho</option>
                      <option value="LR">Liberia</option>
                      <option value="LY">Libya</option>
                      <option value="LI">Liechtenstein</option>
                      <option value="LT">Lithuania</option>
                      <option value="LU">Luxembourg</option>
                      <option value="MO">Macao</option>
                      <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                      <option value="MG">Madagascar</option>
                      <option value="MW">Malawi</option>
                      <option value="MY">Malaysia</option>
                      <option value="MV">Maldives</option>
                      <option value="ML">Mali</option>
                      <option value="MT">Malta</option>
                      <option value="MH">Marshall Islands</option>
                      <option value="MQ">Martinique</option>
                      <option value="MR">Mauritania</option>
                      <option value="MU">Mauritius</option>
                      <option value="YT">Mayotte</option>
                      <option value="MX">Mexico</option>
                      <option value="FM">Micronesia, Federated States of</option>
                      <option value="MD">Moldova, Republic of</option>
                      <option value="MC">Monaco</option>
                      <option value="MN">Mongolia</option>
                      <option value="ME">Montenegro</option>
                      <option value="MS">Montserrat</option>
                      <option value="MA">Morocco</option>
                      <option value="MZ">Mozambique</option>
                      <option value="MM">Myanmar</option>
                      <option value="NA">Namibia</option>
                      <option value="NR">Nauru</option>
                      <option value="NP">Nepal</option>
                      <option value="NL">Netherlands</option>
                      <option value="NC">New Caledonia</option>
                      <option value="NZ">New Zealand</option>
                      <option value="NI">Nicaragua</option>
                      <option value="NE">Niger</option>
                      <option value="NG">Nigeria</option>
                      <option value="NU">Niue</option>
                      <option value="NF">Norfolk Island</option>
                      <option value="MP">Northern Mariana Islands</option>
                      <option value="NO">Norway</option>
                      <option value="OM">Oman</option>
                      <option value="PK">Pakistan</option>
                      <option value="PW">Palau</option>
                      <option value="PS">Palestinian Territory, Occupied</option>
                      <option value="PA">Panama</option>
                      <option value="PG">Papua New Guinea</option>
                      <option value="PY">Paraguay</option>
                      <option value="PE">Peru</option>
                      <option value="PH">Philippines</option>
                      <option value="PN">Pitcairn</option>
                      <option value="PL">Poland</option>
                      <option value="PT">Portugal</option>
                      <option value="PR">Puerto Rico</option>
                      <option value="QA">Qatar</option>
                      <option value="RE">Réunion</option>
                      <option value="RO">Romania</option>
                      <option value="RU">Russian Federation</option>
                      <option value="RW">Rwanda</option>
                      <option value="BL">Saint Barthélemy</option>
                      <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                      <option value="KN">Saint Kitts and Nevis</option>
                      <option value="LC">Saint Lucia</option>
                      <option value="MF">Saint Martin (French part)</option>
                      <option value="PM">Saint Pierre and Miquelon</option>
                      <option value="VC">Saint Vincent and the Grenadines</option>
                      <option value="WS">Samoa</option>
                      <option value="SM">San Marino</option>
                      <option value="ST">Sao Tome and Principe</option>
                      <option value="SA">Saudi Arabia</option>
                      <option value="SN">Senegal</option>
                      <option value="RS">Serbia</option>
                      <option value="SC">Seychelles</option>
                      <option value="SL">Sierra Leone</option>
                      <option value="SG">Singapore</option>
                      <option value="SX">Sint Maarten (Dutch part)</option>
                      <option value="SK">Slovakia</option>
                      <option value="SI">Slovenia</option>
                      <option value="SB">Solomon Islands</option>
                      <option value="SO">Somalia</option>
                      <option value="ZA">South Africa</option>
                      <option value="GS">South Georgia and the South Sandwich Islands</option>
                      <option value="SS">South Sudan</option>
                      <option value="ES">Spain</option>
                      <option value="LK">Sri Lanka</option>
                      <option value="SD">Sudan</option>
                      <option value="SR">Suriname</option>
                      <option value="SJ">Svalbard and Jan Mayen</option>
                      <option value="SZ">Swaziland</option>
                      <option value="SE">Sweden</option>
                      <option value="CH">Switzerland</option>
                      <option value="SY">Syrian Arab Republic</option>
                      <option value="TW">Taiwan, Province of China</option>
                      <option value="TJ">Tajikistan</option>
                      <option value="TZ">Tanzania, United Republic of</option>
                      <option value="TH">Thailand</option>
                      <option value="TL">Timor-Leste</option>
                      <option value="TG">Togo</option>
                      <option value="TK">Tokelau</option>
                      <option value="TO">Tonga</option>
                      <option value="TT">Trinidad and Tobago</option>
                      <option value="TN">Tunisia</option>
                      <option value="TR">Turkey</option>
                      <option value="TM">Turkmenistan</option>
                      <option value="TC">Turks and Caicos Islands</option>
                      <option value="TV">Tuvalu</option>
                      <option value="UG">Uganda</option>
                      <option value="UA">Ukraine</option>
                      <option value="AE">United Arab Emirates</option>
                      <option value="GB">United Kingdom</option>
                      <option value="US">United States</option>
                      <option value="UM">United States Minor Outlying Islands</option>
                      <option value="UY">Uruguay</option>
                      <option value="UZ">Uzbekistan</option>
                      <option value="VU">Vanuatu</option>
                      <option value="VE">Venezuela, Bolivarian Republic of</option>
                      <option value="VN">Viet Nam</option>
                      <option value="VG">Virgin Islands, British</option>
                      <option value="VI">Virgin Islands, U.S.</option>
                      <option value="WF">Wallis and Futuna</option>
                      <option value="EH">Western Sahara</option>
                      <option value="YE">Yemen</option>
                      <option value="ZM">Zambia</option>
                      <option value="ZW">Zimbabwe</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-md-12">
              <div class="form-group">
                <div class="btn btn-black btn-settings-save" v-on:click="updateUser;update_status=1">Save</div>
              </div>
            </div>
            <div class="col col-dm-12 text-right">
              <div class="alert alert-green" v-if="update_status == 1" v-on:click="update_status=0">Your Settings have been updated.</div>
            </div>
          </div>

          <div class="row u-settings-body">
            <div class="col-md-7">
              <h1>Password</h1>
              <div class="form-group">
                <div class="row">
                  <div class="col col-md-12">
                    <label>Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" v-model="user.password_current" v-bind:class="{'inpt-error':set_error.password_current}" v-on:click="set_error.password_current = 0" v-on:keyup="set_status = ''">
                  </div>
                </div>
                <div class="row">
                  <div class="col col-md-6">
                    <label>New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" v-model="user.password_new" v-bind:class="{'inpt-error':set_error.password_new}" v-on:click="set_error.password_new = 0" v-on:keyup="set_status = ''">
                  </div>
                  <div class="col col-md-6">
                    <label>Repeat your new password</label>
                    <input type="password" class="form-control" v-model="user.password_repeat" v-bind:class="{'inpt-error':set_error.password_repeat}" v-on:click="set_error.password_repeat = 0" v-on:keyup="set_status = ''">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-12 text-right">
                  <div class="form-group">
                    <div class="btn btn-black" v-on:click="update_password_status=1">Set new Password</div>
                  </div>
                </div>
                <div class="col col-dm-12 text-right">
                  <div class="alert alert-green" v-if="update_password_status == 1" v-on:click="update_password_status=0">Your successfully changed your password.</div>
                </div>
              </div>
            </div>
          </div>

          <div class="row u-settings-body">
            <div class="col-md-7">
              <h1>Notifications</h1>
              <div class="form-group">
                <div class="row">
                  <div class="col col-md-12">

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7">
              <h1>ROIC Partner Status</h1>
              <div v-if="!$root.user.is_partner">
                <div class="form-group">
                  <p class="clr-red">You are not a ROIC Partner</p>
                </div>
                <div class="row">
                  <div class="col col-md-12">
                    <div class="form-group">
                      <router-link to="/partner" class="btn btn-black">Start now</router-link>
                    </div>
                  </div>
                </div>
              </div>
              <div v-if="$root.user.is_partner">
                <div class="form-group">
                  <p class="clr-green">You are a ROIC Partner</p>
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
      user:[],
      set_status:'',
      update_status:0,
      update_password_status:0,
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
  			est_inv:0,
        phone:0,
        password_current:0,
        password_new:0,
        password_repeat:0
  		}
    }
  },
  created() {
    var vm = this;
    vm.getUser();
  },
  methods: {
    getUser() {
      var vm = this;
      $.getJSON(domain+'/api/user', function(response) {
        vm.user = response;
      });
    }
  },
  components: {
    Header,
    Navigation
  }
}
</script>
