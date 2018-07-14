<template>
  <div class="container">
    <div class="sec-orders app-shop">
      <h1>Shop overview</h1>
      <p>
        Informations Text zu Shop Overview Seite
      </p>

      <div class="row">
        <div class="col-md-3" v-for="(pack, index) in roic_packages">
          <figure class="card card-product">
            <div class="img-wrap">
              <img src="https://roic.io/wp-content/uploads/2018/02/Roin_in_Bild3-2-frei-300x300.png" v-if="pack.type=='roic_coins'">
              <img :src="pack.main_thumbnail" v-if="pack.type=='information'">
            </div>
            <figcaption class="info-wrap">
              <h4 class="title">{{pack.display_name}}</h4>
              <!--
              <p class="desc">Standard Pack</p>
              <div class="rating-wrap">
                <div class="label-rating">Info</div>
              </div>
              -->
            </figcaption>
            <div class="bottom-wrap">
              <div class="btn btn-black float-right" v-on:click="addItemToCart(pack.id)">Buy Now</div>
              <div class="price-wrap h5">
                <span class="price-new">${{pack.price}}</span> <del class="price-old" v-if="pack.price_old">${{pack.price_old}}</del>
              </div>
            </div>
          </figure>
        </div>
      </div>

      <!--
      <div class="card-custom mb-1 text-left">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Choose amount of Coins</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$1200 <small class="text-muted">/ 1800 ROIC Coins</small></h1>
            <button type="button" class="btn btn-lg btn-primary">Buy Coins</button>
          </div>
        </div>
      </div>
      -->
    </div>
    <notifications group="item_to_cart" class="rc-notification" />
    <notifications group="item_not_found" class="rc-notification-red" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      roic_packages:[]
    }
  },
  created() {
    var vm = this;
    vm.getItems();
  },
  methods: {
    getItems() {
      var vm = this;
      $.getJSON(domain+'/api/shop/articles/1', function(response) {
        vm.roic_packages = response;
      });
    },
    addItemToCart(item_id) {
      var vm = this;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: domain+'/api/session/cart/item/add',
        type: 'post',
        dataType: 'json',
        data: {item_id:item_id},
        beforeSend: function(data) {},
        complete: function(data) {
          var response = $.parseJSON(data.responseText);
          if (response.status == 'item_not_found') {
            vm.$notify({
              group: 'item_not_found',
              duration:3000,
              text: 'This item is currently not available'
            });
          }
          if (response.status == 'item_added' || response.status == 'quantity_updated') {
            vm.$root.getCart();
            vm.$notify({
              group: 'item_to_cart',
              duration:3000,
              text: 'A new item was added into your cart'
            });
            window.location.href = '/#/cart';
          }
        }
      });
    }
  }
}
</script>
