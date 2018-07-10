<template>
  <div class="app">
    <div class="rc-user">
      <h1>Account Overview</h1>
      <div class="user-name">Hello <strong>{{$root.user.username}}</strong></div>
      <div class="user-welcome" v-if="show_welcome == 1">
        From your account dashboard you can manage your orders, informations and edit your password and profile. <a v-on:click="show_welcome = 0"><small>hide message</small></a>
      </div>
      <a class="user-logout" href="/logout">Logout</a>
      <br>

      <div class="alert alert-black">
        The Know Your Customer (KYC) verification process has to be completed before being eligible to invest.
        <router-link v-on:click="section = 'kyc'" to="/user/kyc">Get verified here</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show_welcome:1
    }
  },
  created() {

  },
  methods: {
  }
}
</script>
