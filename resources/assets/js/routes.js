import Vue from 'vue'
import VueRouter from 'vue-router'

import user from './components/user/user.vue'
import user_kyc from './components/user/kyc.vue'
import user_settings from './components/user/settings.vue'
import user_informations from './components/user/informations.vue'
import user_orders from './components/user/orders.vue'
import user_order from './components/user/order.vue'
import overview from './components/shop/overview.vue'
import cart from './components/shop/cart.vue'
import checkout from './components/shop/checkout.vue'
import payment from './components/shop/payment.vue'
import order_complete from './components/shop/order_complete.vue'
import partner from './components/partner/partner.vue'

Vue.use(VueRouter)

// 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter and then call Vue.use(VueRouter).

// 1. Define route components.
// These can be imported from other files
const error = { template: '<div>Diese Seite gibt es nicht.</div>' }

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// Vue.extend(), or just a component options object.
// We'll talk about nested routes later.
const routes = [
  { path: '/', component: user },
  { path: '/user', component: user },
  { path: '/user/kyc', component: user_kyc },
  { path: '/user/settings', component: user_settings },
  //{ path: '/user/informations', component: user_informations },
  //{ path: '/user/informations/:info_id', component: user_informations },
  { path: '/user/orders', component: user_orders },
  { path: '/user/orders/:order_id', component: user_order },
  { path: '/shop', component: overview },
  { path: '/cart', component: cart },
  { path: '/checkout', component: checkout },
  { path: '/checkout/payment', component: payment },
  { path: '/checkout/order/complete', component: order_complete },
  { path: '/partner', component: partner },

  { path: '*', component: error }
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
  routes
  //mode: 'history' (removes the hashtag from url)
})
// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
/*
const app = new Vue({
  router
}).$mount('#app')
*/
// Now the app has started!

export default router
