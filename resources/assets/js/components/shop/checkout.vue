<template>
  <div class="container">
    <div class="sec-orders">
      <h1>Checkout</h1>

      <form id="checkout_form" name="checkout_form">
        <div v-if="$root.user">
          <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed" v-for="(item, index) in cart.items">
                  <div v-if="item.item_type !== 'coupon'">
                    <div>
                      <h6 class="my-0">{{item.details.display_name}}</h6>
                      <small class="text-muted">{{item.details.type}}</small>
                    </div>
                    <span class="text-muted">{{item.quantity}} x ${{$root.rnd(item.details.price)}}</span>
                  </div>
                  <div v-if="item.item_type == 'coupon'">
                    <div class="text-success">
                      <h6 class="my-0">Coupon</h6>
                      <small>{{item.display_name}}</small>
                    </div>
                    <span class="text-success">-${{$root.rnd(item.amount)}}</span>
                    <div class="btn btn-danger btn-sm" v-on:click="removeCoupon()">remove</div>
                  </div>
                </li>


                <li class="list-group-item d-flex justify-content-between bg-light" v-if="coupon.status == 1">
                  <div class="text-success">
                    <h6 class="my-0">Coupon</h6>
                    <small>{{coupon.code}}</small>
                  </div>
                  <span class="text-success">-${{$root.rnd(coupon.value)}}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                  <span>total (usd)</span>
                  <strong>${{$root.rnd(cart_total)}}</strong>
                </li>
              </ul>

              <div>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Coupon" v-model="coupon.coupon_code">
                  <div class="input-group-append">
                    <div class="btn btn-secondary" v-on:click="addCoupon(coupon.coupon_code)">redeem</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 order-md-1">
              <h4 class="mb-3">Please fill in the missing information.</h4>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstname">Firstname</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" v-model="user.firstname">
                  <div class="error-msg" v-if="form_errors.firstname">
                    valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastname">Lastname</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" v-model="user.lastname">
                  <div class="error-msg" v-if="form_errors.lastname">
                    valid last name is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="username" name="username" placeholder="username" v-model="user.username">
                  <div class="error-msg" style="width: 100%;" v-if="form_errors.username">
                    your username is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">E-Mail <span class="text-muted">(optional)</span></label>
                <input type="email" class="form-control" id="email" name="email" v-model="user.email">
                <div class="error-msg" v-if="form_errors.email">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Street</label>
                <input type="text" class="form-control" id="address" name="address" v-model="user.address">
                <div class="error-msg" v-if="form_errors.address">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="mb-3">
                <label>City</label>
                <input type="text" class="form-control" id="city" name="city" v-model="user.city">
                <div class="error-msg" v-if="form_errors.city">
                  Please enter your city.
                </div>
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country">Country</label>
                  <select class="custom-select d-block w-100" id="country" name="country" v-model="user.country">
                    <option value="">choose...</option>
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
                  <div class="error-msg" v-if="form_errors.country">
                    Please select a valid country.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="state">State</label>
                  <select class="custom-select d-block w-100" id="state" name="state" v-model="user.state">
                    <option value="">choose...</option>
                    <option>california</option>
                  </select>
                  <div class="error-msg" v-if="form_errors.state">
                    Please provide a valid state.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="zip">Zip</label>
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="" v-model="user.zip">
                  <div class="error-msg" v-if="form_errors.zip">
                    zip code required.
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </form>

      <div class="row">
        <div class="col-md-12">
          <div class="text-right">
            <div class="btn btn-gold" v-on:click="checkout">continue to payment</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      user:{
        firstname:'',
        lastname:'',
        username:'',
        email:'',
        address:'',
        city:'',
        country:'',
        state:'',
        zip:''
      },
      registered_user:{
        firstname:'',
        lastname:'',
        username:'',
        email:'',
        address:'',
        city:'',
        country:'',
        state:'',
        zip:''
      },
      cart:[],
      cart_total:0,
      cart_subtotal:0,
      coupon:[],
      form_errors:{
        firstname:0,
        lastname:0,
        username:0,
        email:0,
        address:0,
        city:0,
        country:0,
        state:0,
        zip:0
      },
      form_errors_new_user:{
        firstname:0,
        lastname:0,
        username:0,
        email:0,
        address:0,
        city:0,
        country:0,
        state:0,
        zip:0
      }
    }
  },
  created() {
    var vm = this;
    vm.getCart();
    vm.getUser();
    //vm.getCoupon();
  },
  methods: {
    checkout() {
      var vm = this;
      vm.form_errors.firstname = 0;
      vm.form_errors.lastname = 0;
      vm.form_errors.username = 0;
      vm.form_errors.email = 0;
      vm.form_errors.address = 0;
      vm.form_errors.city = 0;
      vm.form_errors.country = 0;
      vm.form_errors.state = 0;
      vm.form_errors.zip = 0;
      if (vm.user.firstname == null) {
        vm.form_errors.firstname = 1;
      }
      if (vm.user.lastname == null) {
        vm.form_errors.lastname = 1;
      }
      if (vm.user.username == null) {
        vm.form_errors.username = 1;
      }
      if (vm.user.email == null) {
        vm.form_errors.email = 1;
      }
      if (vm.user.address == null) {
        vm.form_errors.address = 1;
      }
      if (vm.user.city == null) {
        vm.form_errors.city = 1;
      }
      if (vm.user.country == null) {
        vm.form_errors.country = 1;
      }
      if (vm.user.state == null) {
        vm.form_errors.state = 1;
      }
      if (vm.user.zip == null) {
        vm.form_errors.zip = 1;
      }
      if (vm.user.firstname == null || vm.user.lastname == null || vm.user.username == null || vm.user.email == null || vm.user.address == null || vm.user.city == null || vm.user.country == null || vm.user.state == null || vm.user.zip == null) {

      } else {
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: domain+'/api/checkout/user/update',
          type: 'post',
          dataType: 'json',
          data: $('#checkout_form').serialize(),
          beforeSend: function(data) {},
          complete: function(data) {
            var response = $.parseJSON(data.responseText);
            if (response.status == 'success' || response.status == 'no_changes') {
              window.location.href = domain+'#/checkout/payment';
            }
          }
        });
      }
    },
    getUser() {
      var vm = this;
      $.getJSON(domain+'/api/user', function(response) {
        vm.user = response;
      });
    },
    getCoupon() {
      var vm = this;
      $.getJSON(domain+'/api/session/cart/coupon', function(response) {
        //vm.coupon = response;
      });
    },
    addCoupon(coupon_code) {
      var vm = this;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: domain+'/api/session/cart/coupon/add',
        type: 'post',
        dataType: 'json',
        data: {coupon_code:coupon_code},
        beforeSend: function(data) {},
        complete: function(data) {
          var response = $.parseJSON(data.responseText);
          //vm.coupon = response;
          vm.getCart();
          vm.totalPriceCalculation();
        }
      });
    },
    removeCoupon() {
      var vm = this;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: domain+'/api/session/cart/coupon/remove',
        type: 'post',
        dataType: 'json',
        data: {},
        beforeSend: function(data) {},
        complete: function(data) {
          var response = $.parseJSON(data.responseText);
          if (response.status == 'coupon_removed') {
            vm.getCart();
          }
        }
      });
    },
    getCart() {
      var vm = this;
      $.getJSON(domain+'/api/session/cart', function(response) {
        vm.cart = response;
        if (vm.cart.items.length == 0) {
          window.location.href = '#/cart';
        }
        vm.totalPriceCalculation();
      });
    },
    totalPriceCalculation() {
      var vm = this;
      vm.cart_total = 0;
      for (var i = 0; i < vm.cart.items.length; i++) {
        if (vm.cart.items[i].item_type !== 'coupon') {
          vm.cart_total = vm.cart.items[i].details.price * vm.cart.items[i].quantity + vm.cart_total;
        }
        if (vm.cart.items[i].item_type == 'coupon') {
          vm.cart_total = vm.cart_total + parseFloat(vm.cart.items[i].amount);
        }
      }
      vm.cart_subtotal = vm.cart_total;
    }
  }
}
</script>
