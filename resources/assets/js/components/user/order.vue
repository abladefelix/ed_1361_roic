<template>
  <div class="container">
    <Header/>

    <div v-if="$route.params.order_id" class="app-orders">
      <div class="app-body">
        <Navigation/>
      </div>
      <div>
        <router-link to="/user/orders" class="app-back-link"><i class="fas fa-arrow-left"></i> View all orders</router-link>
        <div class="app-title order-title">Order - #{{order.order_id}}</div>
        <div class="receipt-main col-md-12">
          <div class="row">
            <div class="receipt-header">
              <div class="col-md-12">
                <div class="receipt-right">
                  <h5>ROIC FIRMA?</h5>
                  <p>+1 3649-6589 TEL?</p>
                  <p>info@roic.io</p>
                  <p>ORT?</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <h5>{{order.user_firstname}} {{order.user_lastname}}</h5>
                  <p><b>Email :</b> {{order.user_email}}</p>
                  <p><b>Address :</b> {{order.user_address}}</p>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="receipt-left">
                  <h3>INVOICE # {{order.order_id}}</h3>
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
                <tr v-for="line in order.lines">
                  <td class="col-md-9">
                    <div v-if="line.item_type == 'roic_coins'">ROIC Coin Purchase</div>
                    <div v-if="line.item_type == 'information'">Information Material Purchase</div>
                  </td>
                  <td class="col-md-3"><i class="fa fa-inr"></i>$ {{line.amount}}</td>
                </tr>
                <tr>
                  <!--
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
                  -->
                </tr>
                <tr>

                  <td class="text-right"><h2><strong>Total: </strong></h2></td>
                  <td class="text-left text-danger"><h2><strong>$ {{order.amount}}</strong></h2></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid receipt-footer">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <p><b>Date :</b> {{order.order_date}}</p>
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
      order:[]
    }
  },
  created() {
    var vm = this;
    vm.getOrder();
  },
  methods: {
    getOrder() {
      var vm = this;
      $.getJSON(domain+'/api/user/order/'+vm.$route.params.order_id, function(response) {
        vm.order = response;
      });
    }
  },
  components: {
    Header,
    Navigation
  }
}
</script>
