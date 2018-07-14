<template>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Transaction History </div>
      <div class="card-body">

        <!-- No of Entries and Search box -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
              <!--<div>             
              <input id="entries" class="form-control" type="number" name="quantity" min="1" max="5">
              <label for="entries">entries</label>
              </div>-->
              <form>
                <div class="form-group">
                  <label for="formGroupExampleInput">Entries</label>
                  <input type="number" class="form-control" name="quantity" min="1" max="10" id="formGroupExampleInput" placeholder="Entries" v-model="rows_per_page" v-on:blur="selectedRowsPerPage()">
                </div>
      
              </form>
            </div>

            <div class="col-md-3 offset-md-7">
              <form>
                <div class="form-group">
                  <label for="formGroupExampleInput">Search</label>
                  <input v-model="search_input" type="text" class="form-control" name="search" id="formGroupExampleInput" placeholder="Search">
                </div>
      
              </form>
            </div>
          </div>
        </div>

        <!-- End of Entries input and Search box -->

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Transaction Number</th>
                <th>Transacted on</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Charge</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="transaction in transactions">
                <td>{{ transaction.id }}</td>
                <td>{{ transaction.transaction_number }}</td>
                <td>{{ transaction.transacted_on }}</td>
                <td>{{ transaction.description }}</td>
                <td>{{ transaction.amount }}</td>
                <td>{{ transaction.charge }}</td>
              </tr>
              
            </tbody>
          </table>
        </div>


        <!-- Showing Entries and Pagination -->
        <div class="container-fluid">
          <div class="row">
            <!-- Showing entries -->
            <div class="col">
              <p>Showing {{ no_of_entries_info.from }} to {{ no_of_entries_info.to }} out of {{ no_of_entries_info.out_of }} entries</p> 
            </div>
            <!-- Pagination -->
            <div class="col">
            <nav aria-label="Page navigation example" class="float-right">
              <ul class="pagination">
                <!--<li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
                <li class="page-item">
                  <router-link class="page-link" :to="{ name: 'transactionsPage', params: { page_no: pagination.previous_page, rows_per_page: rows_per_page} }" exact>Previous
                  </router-link>
                </li>
                <li v-for="n in pagination.total" active-class="active" class="page-item">
                  <router-link class="page-link" :to="{ name: 'transactionsPage', params: { page_no: n, rows_per_page: rows_per_page} }" exact>{{ n }}
                  </router-link>
                </li>
                <!--<li v-for="n in pagination.total"
                v-bind:class="{'page-item':true, 'active':(n === selected_page_no)}">
                  <router-link class="page-link" :to="{ name: 'transactionsPage', params: { page_no: n, rows_per_page: rows_per_page} }">{{ n }}
                  </router-link>
                  -<a class="page-link" v-on:click="getPaginatedTransactions(n)" >{{ n }}</a>
                </li>-->
                <!--<li class="page-item"><a class="page-link" href="#">Next</a></li>-->
                <li class="page-item">
                  <router-link class="page-link" :to="{ name: 'transactionsPage', params: { page_no: pagination.next_page, rows_per_page: rows_per_page} }" exact>Next
                  </router-link>
                </li>
              </ul>
            </nav>
            </div>
          </div>
        </div>

      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        transactions:[],
        transaction:{
          id: '',
          transaction_number: '',
          transacted_on: '',
          description:'',
          amount: '',
          charge: ''
        },
        selected_page_no: 1,
        paginations:[],
        pagination:{},
        active_page_link_class: '',
        no_of_entries_info:[],
        rows_per_page: 3,
        search_input: ''
      }
    },
    created() {
      var vm = this;
      
      // check if param of page_no is undefined
      if (typeof this.$route.params.page_no !== 'undefined')
        vm.selected_page_no = this.$route.params.page_no; // retrieve param of selected page_no

      // check if param of page_no is undefined
      if (typeof this.$route.params.rows_per_page !== 'undefined')
        vm.rows_per_page = this.$route.params.rows_per_page; // retrieve param of selected page_no

      vm.getPaginatedTransactions(vm.selected_page_no, vm.rows_per_page); // getPaginatedTransactions      
    },
    methods: {

        // default method to fetch paginated data
        // parameters are: the selected page number and rows per page
       getPaginatedTransactions(selected_page_no, rows_per_page){
          var vm = this;
          $.getJSON('/api/transaction/paginated/' + selected_page_no + '/' + rows_per_page, function(response) {
            vm.transactions = response;
            vm.pagination = response["pagination"]; // retrieve pagination object
            vm.no_of_entries_info = response["no_of_entries_info"]; // retrieve no_of_entries_info object
          });
       },

       // to be used when there is a Search
       // parameters are: the selected page number, rows per page and search input
       getPaginatedTransactionsSearch(selected_page_no, rows_per_page, search_input){
          var vm = this;
          $.getJSON('/api/transaction/paginated/' + selected_page_no + '/' + rows_per_page + '/' + search_input, function(response) {
            vm.transactions = response;
            vm.pagination = response["pagination"]; // retrieve pagination object
            vm.no_of_entries_info = response["no_of_entries_info"]; // retrieve no_of_entries_info object
          });
       },

       // on blur for no of entries input element
       selectedRowsPerPage(){
        var vm = this;
        vm.selected_page_no = 1; // set default selected page
         // default method to fetch paginated data
         this.getPaginatedTransactions(vm.selected_page_no, vm.rows_per_page); // getPaginatedTransactions
       }
    },
    watch:{
      // whenever the search_input changes, this function will run
      search_input: function (newSearchInput, oldSearchInput) {
        var vm = this;
        vm.getPaginatedTransactionsSearch(vm.selected_page_no, vm.rows_per_page, newSearchInput); // getPaginatedTransactions
      }
      /*// whenever the rows_per_page changes, this function will run
      rows_per_page: function (newRowsPerPage, oldRowsPerPage) {
        var vm = this;
        vm.getPaginatedTransactions(vm.selected_page_no, newRowsPerPage, newSearchInput); // getPaginatedTransactions
      }*/
    }
  }
</script>
