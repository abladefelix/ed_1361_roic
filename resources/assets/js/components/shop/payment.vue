<template>
  <div class="container">
    <div class="app-title">Payment</div>
    <p>
      Pay using BitCoin
    </p>
    <div>
      <div class="row">
        <aside class="col-sm-8">

          <article>
            <div class="app-body" style="padding-top: 16px;">

              <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                    Bitcoin
                  </a>
                </li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade show active" id="nav-tab-card">
                  <img src="/images/demo/qr_code.png" height="128px">
                  <form role="form">
                    <div class="form-group">
                      <label for="username">Wallet ID</label>
                      <input type="text" class="form-control" value="ke09r248gr2h0jf9h84gfhdjk30ß9fhejdk30dk">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <router-link to="/checkout" class="btn btn-black">Back</router-link>
                      </div>
                      <div class="col-md-6 text-right">
                        <div class="btn btn-gold" v-on:click="confirm_payment">Confirm</div>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="tab-pane fade" id="nav-tab-paypal">
                  <p>Paypal is easiest way to pay online</p>
                  <p>
                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                  </p>
                  <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
                  <div class="tab-pane fade" id="nav-tab-bank">
                    <p>Bank accaunt details</p>
                    <dl class="param">
                      <dt>BANK: </dt>
                      <dd> THE WORLD BANK</dd>
                    </dl>
                    <dl class="param">
                      <dt>Accaunt number: </dt>
                      <dd> 12345678912345</dd>
                    </dl>
                    <dl class="param">
                      <dt>IBAN: </dt>
                      <dd> 123456789</dd>
                    </dl>
                    <p>
                      <strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                  </div>
                </div>

              </div>
            </article>


          </aside>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        cart:[]
      }
    },
    created() {
      var vm = this;
      vm.getCart();
    },
    methods: {
      getCart() {
        var vm = this;
        $.getJSON(domain+'/api/session/cart', function(response) {
          vm.cart = response;
          if (vm.cart.items.length == 0) {
            window.location.href = '#/cart';
          }
        });
      },
      confirm_payment() {
        var vm = this;
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: domain+'/api/checkout/confirm',
          type: 'post',
          dataType: 'json',
          data: {},
          beforeSend: function(data) {},
          complete: function(data) {
            var response = $.parseJSON(data.responseText);
            if (response.status == 'success') {
              window.location.href = domain+'#/user/orders/'+response.order_id;
            }
          }
        });
      }
    }
  }
  </script>
