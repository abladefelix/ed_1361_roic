<template>
  <div class="container">
    <Header/>
    <div class="app-body" v-if="$route.params.order_id == null">
      <div class="sec-orders">
        <Navigation/>
        <div class="app-title">Orders</div>
        <div v-if="browser_size < 756">
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="(order, index) in orders">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">
                <div v-if="order.items_coins !== 0">
                  <div>ROIC Coin Purchase</div>
                </div>
                <div v-if="order.items_info !== 0">
                  <div>Information Material Purchase</div>
                </div>
                <div v-if="order.got_coupon">Coupon: {{order.got_coupon}}</div>
              </h5>
            </div>
            {{order.order_date}}
            <div class="order-price">
              <strong>
                <span v-if="order.price == 0">FREE</span>
                <span v-if="order.price !== 0">{{order.amount}} $</span>
              </strong>
            </div>
            <div class="order-status">
              <div v-if="order.status == 'enrolled'" class="wc-completed clr-green"><i class="fas fa-check"></i> Completed</div>
              <div v-if="order.status == 'payed'" class="wc-completed clr-green"><i class="fas fa-check"></i> Completed</div>
              <div v-if="order.status == 'open'">Pending</div>

              <div v-if="order.status == 'wc-processing'">Pending</div>
              <div v-if="order.status == 'wc-pending'">Pending</div>
              <div v-if="order.status == 'wc-completed'" class="wc-completed clr-green"><i class="fas fa-check"></i> Completed</div>
              <div v-if="order.status == 'wc-cancelled'" class="wc-cancelled"><i class="fas fa-times"></i> Cancelled</div>
            </div>
            <div class="order-action">
              <router-link :to="'/user/orders/'+order.order_id" class="action-btn" data-toggle="modal" data-target="#invoice_modal">open</router-link>
            </div>
          </a>
        </div>
        <table id="customers" v-if="browser_size > 756">
          <tr>
            <th>Invoice type</th>
            <th>Date</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <tr v-for="(order, index) in orders">
            <td>
              <img src="https://roic.io/wp-content/uploads/frontend/roic_icon_flat_gold.svg" v-if="order.order_type == 'roic_purchase'" height="24px" class="coin-flat">
              <img src="https://roic.io/wp-content/uploads/frontend/book_icon_flat.svg" v-if="order.order_type == 'info_purchase'" height="24px" class="coin-flat">
              <div v-if="order.items_coins !== 0">
                <div>ROIC Coin Purchase <!--<strong>{{order.roic_coins}} Coins</strong>--></div>
              </div>
              <div v-if="order.items_info !== 0">
                <div>Information Material Purchase</div>
                <!--<div><strong>{{order.info}}</strong></div>-->
              </div>
              <div v-if="order.got_coupon">Coupon: {{order.got_coupon}}</div>
            </td>
            <td>
              <div class="order-date">
                {{order.order_date}}
              </div>
            </td>
            <td>
              <div class="order-price">
                <strong>
                  <span v-if="order.price == 0">FREE</span>
                  <span v-if="order.price !== 0">{{order.amount}} $</span>
                </strong>
              </div>
            </td>
            <td>
              <div class="order-status">
                <div v-if="order.status == 'enrolled'" class="wc-completed clr-green"><i class="fas fa-check"></i> Completed</div>
                <div v-if="order.status == 'payed'" class="wc-completed clr-green"><i class="fas fa-check"></i> Completed</div>
                <div v-if="order.status == 'open'">Pending</div>

                <div v-if="order.status == 'wc-processing'">Pending</div>
                <div v-if="order.status == 'wc-pending'">Pending</div>
                <div v-if="order.status == 'wc-completed'" class="wc-completed clr-green"><i class="fas fa-check"></i> Completed</div>
                <div v-if="order.status == 'wc-cancelled'" class="wc-cancelled"><i class="fas fa-times"></i> Cancelled</div>
              </div>
            </td>
            <td>
              <div class="order-action">
                <router-link :to="'/user/orders/'+order.order_id" class="action-btn" data-toggle="modal" data-target="#invoice_modal">open</router-link>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div v-if="$route.params.order_id" class="app-orders">
      <div class="app-body">
        <Navigation/>
      </div>
      <div>
        <router-link to="/user/orders" class="app-back-link"><i class="fas fa-arrow-left"></i> View all orders</router-link>
        <div class="app-title order-title">Order - RC927393027</div>
        <div class="receipt-main col-md-12">
          <div class="row">
            <div class="receipt-header">
              <div class="col-md-12">
                <div class="receipt-right">
                  <h5>Company Name.</h5>
                  <p>+1 3649-6589 <i class="fa fa-phone"></i></p>
                  <p>company@gmail.com <i class="fa fa-envelope-o"></i></p>
                  <p>USA <i class="fa fa-location-arrow"></i></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <h5>Customer Name </h5>
                  <p><b>Mobile :</b> +1 12345-4569</p>
                  <p><b>Email :</b> customer@gmail.com</p>
                  <p><b>Address :</b> New York, USA</p>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                  <h3>INVOICE # 102</h3>
                </div>
              </div>
            </div>
          </div>

          <div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col-md-9">Payment for August 2016</td>
                  <td class="col-md-3"><i class="fa fa-inr"></i> 15,000/-</td>
                </tr>
                <tr>
                  <td class="col-md-9">Payment for June 2016</td>
                  <td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
                </tr>
                <tr>
                  <td class="col-md-9">Payment for May 2016</td>
                  <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                </tr>
                <tr>
                  <td class="text-right">
                    <p>
                      <strong>Total Amount: </strong>
                    </p>
                    <p>
                      <strong>Late Fees: </strong>
                    </p>
                    <p>
                      <strong>Payable Amount: </strong>
                    </p>
                    <p>
                      <strong>Balance Due: </strong>
                    </p>
                  </td>
                  <td>
                    <p>
                      <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i> 500/-</strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i> 1300/-</strong>
                    </p>
                    <p>
                      <strong><i class="fa fa-inr"></i> 9500/-</strong>
                    </p>
                  </td>
                </tr>
                <tr>

                  <td class="text-right"><h2><strong>Total: </strong></h2></td>
                  <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid receipt-footer">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <p><b>Date :</b> 15 Aug 2016</p>
                  <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                  <h1>Stamp</h1>
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
      orders:[],
      browser_size:window.innerWidth
    }
  },
  created() {
    var vm = this;
    vm.getOrders();
  },
  methods: {
    getOrders() {
      var vm = this;
      $.getJSON(domain+'/api/user/orders', function(response) {
        vm.orders = response;
      });
    }
  },
  components: {
    Header,
    Navigation
  }
}
</script>
