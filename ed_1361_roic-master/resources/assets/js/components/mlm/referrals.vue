<template>
  <div>

    <div class="container-fluid">

    <div class="row">  

    <h3>Referral Statistics / Overview </h3>
    <div class="container-fluid" style="margin-bottom: 20px;">

      <div class="row">
          
        <!-- Chart stats. -->
        <div class="col">
          <h5>Statistics</h5>
          <div class="card" style="">
            <div class="card-body">
              <!-- Chart Component -->
              <chart-demo-component></chart-demo-component>
            </div>
          </div>
        </div>
        <!-- Monthly -->
        <div class="col">
          <h5>Acquired Members with Referrals</h5>
          <div class="card" style="">
            <div class="card-body">
              <!--<h5 class="card-title">Acquired Members with Referrals</h5>-->
              <!--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
              <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
              <!--<a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>-->
              <table class="table table-borderless">
                <tr>
                  <th></th>
                  <th>1 Month</th>
                  <th>3 Months</th>
                  <th>1 Year</th>
                </tr>
                <tr v-for="referral_monthly_action in referral_monthly_actions">
                  <td><a href=""> Banner </a></td>
                  <td>{{ referral_monthly_action.one_month }}</td>
                  <td>{{ referral_monthly_action.three_months }}</td>
                  <td>{{ referral_monthly_action.one_year }}</td>
                </tr>
                <!--<tr>
                  <td>Banner 1</td>
                  <td>30</td>
                  <td>399</td>
                  <td>745</td>
                </tr>
                <tr>
                  <td>Banner 2</td>
                  <td>30</td>
                  <td>399</td>
                  <td>745</td>
                </tr>-->
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Referrals List</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <!--<th><!--Id</th>-->
                <th>Partner Id</th>
                <th>New Member Id</th>
                <th>Link Type</th>
                <th>Time of Action</th>
                <th>Type of Action</th>
                <th>Referral Link Id</th>
              </tr>
            </thead>
           
            <tbody>
              <tr v-for="referral in referrals">
                <!--<td>{{ referral.id }}</td>-->
                <td>{{ referral.partner_id }}</td>
                <td>{{ referral.new_member_id }}</td>
                <td>{{ referral.link_type }}</td>
                <td>{{ referral.time_of_action }}</td>
                <td>{{ referral.type_of_action }}</td>
                <td><a class="" href="" v-on:click="getReferralLink(referral.referral_link_id)" >{{ referral.referral_link_id }}</a></td>
                <!--<td>{{ referral.referral_link_id }}</td>-->
              </tr>
               
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

       </div>

     </div>

  </div>
  </template>

  <script>
  import Chart from 'chart.js';
  export default {
    data() {
      return {
          referrals:[],
          errors:{},
          referral:{
              id:'',
              partner_id:'',
              new_member_id:'',
              link_type:'',
              time_of_action:'',
              type_of_action:'',
              referral_link_id:''
            },
            referral_links:[],
            referral_link:{
              id:'',
              partner_id:'',
              referral_link_uid:''
            },
            referral_monthly_action:{
              referral_link_id:'',
              one_month:'',
              three_months:'',
              one_year:''
            },
            referral_monthly_actions:[]
      }
    },
    created() {
      var vm = this;
      vm.getAllReferrals(); // getAllReferrals
      vm.getReferralMonthlyActions(); // getReferralMonthlyActions
      //vm.displayChart(); // display Chart
    },
    methods: {
      getAllReferrals(){
        var vm = this;
        $.getJSON('/api/referral/all', function(response) {
          console.log("all referrals response = " + JSON.stringify(response));
          vm.referrals = response;
        });
      },
      getReferralLink(referral_link_id){
        var vm = this;
        //console.log("Passed Referral Link Id =" + referral_link_id);
         $.getJSON('/api/referrallink/' + referral_link_id, function(response) {
            //vm.referral_link = JSON.parse(response);
            vm.referral_links = response;
            console.log("response = " + JSON.stringify(response));
            console.log("Passed Referral Link Id =" + referral_link_id);
            console.log("Referral Link Id =" + vm.referral_link.id);
            console.log("Referral Links Array = " + vm.referral_links);

            /*var SearchTag = function (tagName) {
            var i = null;
            for (i = 0; vm.referral_links.length > i; i += 1) {
                if (vm.referral_links[i].tagName === tagName) {
                    return vm.referral_links[i];
                }
            }
            return null;
            };

            vm.referral_link = SearchTag(referral_link_id);*/

            /*var myArr = JSON.parse(response);
            vm.referral_link = myArr[0];*/
            vm.referral_link = vm.referral_links[0];

            console.log("Referral Link Id =" + vm.referral_link.id);
            console.log("Referral Link Partner Id =" + vm.referral_link.partner_id);
         });
      },
      getReferralMonthlyActions(){
        var vm = this;
        $.getJSON('/api/referral/monthlyactions', function(response) {
          console.log("monthly actions response = " + JSON.stringify(response));
          vm.referral_monthly_actions = response;
        });
      },
      displayChart(){
          var ctx = document.getElementById("myChart");
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });
      }
    }
  }
</script>
