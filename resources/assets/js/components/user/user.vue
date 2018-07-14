<template>
  <div class="container">
    <Header/>
    <div class="app-body">
      <div class="sec-orders">
        <Navigation/>
        <div class="app-block">
          <div class="app-title">Start</div>
          <div class="row">
            <div class="col-md-3">
              <div class="panel panel-default u-panel-info">
                <div class="panel-heading">ROIC Coins</div>
                <div class="panel-body">
                  <span style="font-weight:600;font-size: 19px;">{{$root.user.roic_coins}} ROIC Coins</span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="panel panel-default u-panel-info">
                <div class="panel-heading">Orders</div>
                <div class="panel-body">
                  You have a total of <span style="font-weight:600;font-size: 19px;">{{overview.orders_count}} Orders</span>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <router-link to="/shop" class="btn btn-gold">Buy Roic Coins</router-link>
            </div>
          </div>
        </div>

        <!--
        <div class="app-block">
        <div class="app-title">Statistics</div>
        <p>
        You own <strong style="color: rgb(207, 165, 72);">632</strong> ROIC Coins<br>
        You got <strong style="color: rgb(207, 165, 72);">64</strong> Marketer<br>
        You own <strong style="color: rgb(207, 165, 72);">2</strong> Coupons<br>
        You paid out <strong style="color: rgb(207, 165, 72);">$ 45.500</strong> so far
      </p>
    </div>
  -->

<!--
  <div class="app-block">
  <div class="app-title">Carrier Levels</div>
  <p>Your are currently <strong>Ambassador</strong></p>
  <div class="row">
  <div :style="'position: relative;width: 12.5%;margin-top:'+carrier_level.margin_top+'px'" v-for="carrier_level in carrier_levels">
  <div class="card bg-c-gray order-card" :style="'height:'+carrier_level.height+'px'" v-bind:class="{'bg-c-gold':carrier_level.id == current_carrier_level}">
  <div class="card-block">
  <h1>{{carrier_level.id}}</h1>
  <h6 class="card-title">{{carrier_level.name}}</h6>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default coupon">
<div class="panel-body">
<div class="col-md-6">
<div class="offer">
<span class="usd"><sup></sup></span>
<span class="number">Level 5</span>
<span class="cents"><sup>Ambassador</sup></span>
</div>
</div>
<div class="col-md-12">
<div class="progress" style="height:16px;">
<div class="progress-bar progress-bar-gold" role="progressbar" style="width: 47%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
53% to get to <strong>Level 6</strong>
</div>
<div class="col-md-9">
<ul class="items">
<li>Acquired 2.500 Marketer</li>
<li>Have 10.000 ROIC Coins in your portfolio</li>
<li>Build your own website for ROIC</li>
<li>Been at a ROIC event</li>
</ul>
</div>
<div class="col-md-12">
<p class="disclosure">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
</div>
</div>
</div>
</div>
</div>
</div>

-->


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
      overview:[],
      current_carrier_level:5,
      carrier_levels:[
        {'id':'1','name':'Junior Consultant','height':'160','margin_top':'210'},
        {'id':'2','name':'Consultant','height':'190','margin_top':'180'},
        {'id':'3','name':'Senior Consultant','height':'220','margin_top':'150'},
        {'id':'4','name':'Junior Ambassador','height':'250','margin_top':'120'},
        {'id':'5','name':'Ambassador','height':'280','margin_top':'90'},
        {'id':'6','name':'Senior Consultant','height':'310','margin_top':'60'},
        {'id':'7','name':'Vice President','height':'340','margin_top':'30'},
        {'id':'8','name':'President','height':'370','margin_top':'0'}
      ]
    }
  },
  created() {
    var vm = this;
    vm.getOrdersCount();
  },
  methods: {
    getOrdersCount() {
      var vm = this;
      $.getJSON(domain+'/api/user/overview', function(response) {
        vm.overview = response;
      });
    }
  },
  components: {
    Header,
    Navigation
  }
}
</script>
