<template>
  <div class="container">
    <Header/>
    <div class="app-body">
      <div class="sec-orders" v-if="$route.params.info_id == null">
        <Navigation/>
        <div class="app-title">Informations</div>
        <div>
          <ul class="inf">
            <li class="inf-box" v-for="(info, index) in infos">
              <router-link :to="'/user/informations/'+index">
                <img src="/images/demo/info-template.png" width="100%">
                <div class="title">Blockchain technology</div>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
      <div class="sec-orders" v-if="$route.params.info_id">
        <Navigation/>
        <router-link to="/user/informations/" class="app-back-link"><i class="fas fa-arrow-left"></i> View all Information Packs</router-link>
        <div class="app-title">Information - Kurs X</div>
        <div>
          <div class="row">
            <div class="col-md-10">
              <ul class="cbp_tmtimeline">
                <li>
                  <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span class="hidden">Step 1.</span> <span class="large">4h</span></time>
                  <div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div>
                  <div class="cbp_tmlabel empty"> <span>No Activity</span> </div>
                </li>
                <li>
                  <time class="cbp_tmtime" datetime="2017-11-04T03:45"><span>Step 2.</span> <span>1h</span></time>
                  <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-label"></i></div>
                  <div class="cbp_tmlabel">
                    <h2><a href="javascript:void(0);">Art Ramadani</a> <span>posted a status update</span></h2>
                    <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
                  </div>
                </li>
                <li>
                  <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>Step 3.</span> <span>8h</span></time>
                  <div class="cbp_tmicon bg-green"> <i class="zmdi zmdi-case"></i></div>
                  <div class="cbp_tmlabel">
                    <h2><a href="javascript:void(0);">Job Meeting</a></h2>
                    <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>
                  </div>
                </li>
                <li>
                  <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>Step 4.</span> <span>7h</span></time>
                  <div class="cbp_tmicon bg-blush"><i class="zmdi zmdi-pin"></i></div>
                  <div class="cbp_tmlabel">
                    <h2><a href="javascript:void(0);">Arlind Nushi</a> <span>checked in at</span> <a href="javascript:void(0);">New York</a></h2>
                    <blockquote>
                      <p class="blockquote blockquote-primary">
                        "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."
                        <br>
                        <small>
                          - Isabella
                        </small>
                      </p>
                    </blockquote>
                    <div class="row clearfix">
                      <div class="col-lg-12">
                        <div class="map m-t-10">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477011208!2d-74.11976308802028!3d40.69740344230033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1508039335245" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>Step 5.</span> <span>3h</span></time>
                  <div class="cbp_tmicon bg-orange"><i class="zmdi zmdi-camera"></i></div>
                  <div class="cbp_tmlabel">
                    <h2><a href="javascript:void(0);">Eroll Maxhuni</a> <span>uploaded</span> 4 <span>new photos to album</span> <a href="javascript:void(0);">Summer Trip</a></h2>
                    <blockquote>Pianoforte principles our unaffected not for astonished travelling are particular.</blockquote>
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"><img src="assets/images/image1.jpg" alt="" class="img-fluid img-thumbnail m-t-30"></a> </div>
                      <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img src="assets/images/image2.jpg" alt="" class="img-fluid img-thumbnail m-t-30"></a> </div>
                      <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img src="assets/images/image3.jpg" alt="" class="img-fluid img-thumbnail m-t-30"> </a> </div>
                      <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img src="assets/images/image4.jpg" alt="" class="img-fluid img-thumbnail m-t-30"> </a> </div>
                    </div>
                  </div>
                </li>
                <li>
                  <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>Step 6.</span> <span>Two weeks ago</span></time>
                  <div class="cbp_tmicon bg-green"> <i class="zmdi zmdi-case"></i></div>
                  <div class="cbp_tmlabel">
                    <h2><a href="javascript:void(0);">Job Meeting</a></h2>
                    <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>
                  </div>
                </li>
                <li>
                  <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>Step 7.</span> <span>5h</span></time>
                  <div class="cbp_tmicon bg-blush"><i class="zmdi zmdi-pin"></i></div>
                  <div class="cbp_tmlabel">
                    <h2><a href="javascript:void(0);">Arlind Nushi</a> <span>checked in at</span> <a href="javascript:void(0);">Laborator</a></h2>
                    <blockquote>Great place, feeling like in home.</blockquote>
                  </div>
                </li>
              </ul>
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
      infos:[1,2,3,4,5,6,7,8]
    }
  },
  created() {
    var vm = this;
    console.log(vm.$route.params.info_id);
  },
  methods: {
  },
  components: {
    Header,
    Navigation
  }
}
</script>
