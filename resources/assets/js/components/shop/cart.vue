<template>
  <div class="container">
    <div class="app-cart">
      <div class="app-title">Your Cart</div>
      <p>
        This is your Cart
      </p>
      <div class="card-custom mb-1 text-left">
        <div class="app-body mb-4 box-shadow">
          <div class="card-body">
            <div class="row">
              <div>
                <div v-if="cart.items.length == 0">
                  <p>
                    There are not items in your cart <router-link to="/shop">return to our shop</router-link>.
                  </p>
                </div>

                <div class="list-group" v-if="browser_size < 756">
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="(item, index) in cart.items">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{item.details.display_name}}</h5>
                      <small>
                        <button type="button" class="btn btn-danger btn-red-invert" v-on:click="removeCartItem(index, item.id)" style="width:39px;">
                          <i class="fas fa-times"></i>
                        </button>
                      </small>
                    </div>
                    Total: <strong>$ {{$root.rnd(item.details.price * item.quantity)}}</strong>
                  </a>

                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Total</h5>
                    </div>
                    $ {{$root.rnd(cart_total)}}
                  </a>
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <router-link to="/shop" class="btn btn-white">
                      <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                    </router-link>
                    <button type="button" class="btn btn-gold" v-on:click="checkout">
                      Checkout <span class="glyphicon glyphicon-play"></span>
                    </button>
                  </a>
                </div>

                <table class="table table-hover" v-if="cart.items.length !== 0 && browser_size > 756">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th class="text-center">Price</th>
                      <th class="text-center">Total</th>
                      <th> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in cart.items">
                      <td class="col-sm-8 col-md-6">
                        <div class="media">
                          <div class="media-body">
                            <h4 class="media-heading"><a href="#" class="item-name">{{item.details.display_name}}</a></h4>
                            <h5 class="media-heading"><a href="#" class="item-type">{{item.details.type}}</a></h5>
                          </div>
                        </div>
                      </td>
                      <td class="col-sm-1 col-md-1" style="text-align: center">
                        <!--<input type="email" class="form-control" id="exampleInputEmail1" v-model="item.quantity">-->
                        {{item.quantity}}
                      </td>
                      <td class="col-sm-1 col-md-1 text-center"><strong>$ {{item.details.price}}</strong></td>
                      <td class="col-sm-1 col-md-1 text-center"><strong>$ {{$root.rnd(item.details.price * item.quantity)}}</strong></td>
                      <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger btn-red-invert" v-on:click="removeCartItem(index, item.id)">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                        </button>
                      </td>
                    </tr>

                    <tr>
                      <td>   </td>
                      <td>   </td>
                      <td>   </td>
                      <td><h5>Subtotal</h5></td>
                      <td class="text-right"><h5><strong>${{$root.rnd(cart_subtotal)}}</strong></h5></td>
                    </tr>
                    <tr>
                      <td>   </td>
                      <td>   </td>
                      <td>   </td>
                      <td><h3>Total</h3></td>
                      <td class="text-right"><h3><strong>${{$root.rnd(cart_total)}}</strong></h3></td>
                    </tr>
                    <tr>
                      <td>   </td>
                      <td>   </td>
                      <td>   </td>
                      <td>
                        <router-link to="/shop" class="btn btn-white">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </router-link>
                      </td>
                      <td>
                        <button type="button" class="btn btn-gold" v-on:click="checkout">
                          Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
      cart:[],
      cart_total:0,
      browser_size:window.innerWidth
    }
  },
  created() {
    var vm = this;
    $.getJSON(domain+'/api/session/cart', function(response) {
      vm.cart = response;
      vm.totalPriceCalculation();
    });
  },
  methods: {
    totalPriceCalculation() {
      var vm = this;
      vm.cart_total = 0;
      for (var i = 0; i < vm.cart.items.length; i++) {
        vm.cart_total = vm.cart.items[i].details.price * vm.cart.items[i].quantity + vm.cart_total;
      }
      vm.cart_subtotal = vm.cart_total;
    },
    removeCartItem(index, line_id) {
      var vm = this;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: domain+'/api/session/cart/item/remove',
        type: 'post',
        dataType: 'json',
        data: {line_id:line_id},
        beforeSend: function(data) {
          vm.cart.items.splice(index, 1);
          vm.totalPriceCalculation();
        },
        complete: function(data) {
          var response = $.parseJSON(data.responseText);
          vm.$root.getCart();
        }
      });
    },
    checkout() {
      var vm = this;
      window.location.href = domain+'#/checkout';
    }
  }
}
</script>
