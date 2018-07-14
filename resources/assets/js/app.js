import Routing from './routes.js'
import Notifications from 'vue-notification'
/**
* First we will load all of this project's JavaScript dependencies which
* include Vue and Vue Resource. This gives a great starting point for
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

Vue.use(Notifications)

const app = new Vue({
	el: '#app',
	router: Routing,
	data() {
		return {
			cart: 0,
			user:[]
		}
	},
	created() {
	    var vm = this;
			vm.getUser();
	    vm.getCart();
    },
	methods: {
		getUser() {
      var vm = this;
      $.getJSON(domain+'/api/user', function(response) {
        vm.user = response;
      });
    },
		getCart() {
			var vm = this;
			$.getJSON(domain+'/api/session/cart', function(response) {
	        vm.cart = response;
	    });
		},
		rnd(value) {
      return (Math.round(value * 100) / 100).toFixed(2);
    }
	}
});
