<template>
  <div class="app">
    <ul class="app-nav">
      <li><router-link to="/user">Start</router-link></li>
      <li><router-link to="/user/orders">Orders</router-link></li>
      <!--<li><router-link to="/user/informations">Informations</router-link></li>-->
      <li><router-link to="/user/kyc">KYC</router-link></li>
      <li><router-link to="/user/settings">Settings</router-link></li>
      <li class="partner-link" v-if="$root.user.is_partner"><a href="/">Partner Login</a></li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {

    }
  },
  created() {

  },
  methods: {
    /*
    getTimeYear() {
    var vm = this;
    $.getJSON(domain+'/api/time/year/'+vm.current_year, function(response) {
    vm.time_year = response;
  });
},
*/
}
}
</script>
