<template>
    <div class="home">

      <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" 
        crossorigin="anonymous">

        <section class="bg-primary-3 text-white pb-0 o-hidden">
            <div class="container" v-if="this.$route.params.lang == 'ar'" style="direction:rtl;">
                <div class="row justify-content-between align-items-center" v-for="setting in settings" :key="setting.id">
                  <div class="col-xl-5 col-lg-6 text-center text-lg mb-4 mb-md-5 mb-lg-0" data-aos="fade-right">
                      <h1 class="display-3 stepsTagRtl">{{ setting.title_ar }}</h1>
                      <p class="lead" style="direction:rtl;">{{ setting.breif_ar }}</p>
                      <router-link :to="`/${i18n.locale}/#pricing`" class="nav-item" exact>
                          <a class="btn btn-lg" style="background-color:#6653ff;border-color:#301b72;color:#fff;height:55px;width:200px;border-radius:26px;"><span style="position:relative;top:3px;">{{ $t('header.Subscribe Now') }}</span></a>
                      </router-link>
                  </div>
                <!-- <div class="col" data-aos="fade-left" data-aos-delay="250">
                    <img :src="'assets/img/desktop-app/desktop-app-2.jpg'" alt="Screenshot" class="img-fluid rounded shadow-lg border">
                </div> -->
                </div>
            </div>

            <div class="container" v-else style="direction:ltr;">
                <div class="row justify-content-between align-items-center" v-for="setting in settings" :key="setting.id">
                <div class="col-xl-5 col-lg-6 text-center text-lg mb-4 mb-md-5 mb-lg-0" data-aos="fade-right">
                    <h1 class="display-3 stepsTagLtr">{{ setting.title_en }}</h1>
                    <p class="lead" style="direction:ltr;">{{ setting.breif_en }}</p>
                    <router-link :to="`/${i18n.locale}/#pricing`" class="nav-item" exact>
                        <a class="btn btn-lg" style="background-color:#6653ff;border-color:#301b72;color:#fff;height:55px;width:200px;border-radius:26px;"><span style="position:relative;top:3px;">{{ $t('header.Subscribe Now') }}</span></a>
                    </router-link>
                </div>
                <!-- <div class="col" data-aos="fade-left" data-aos-delay="250">
                    <img :src="'assets/img/desktop-app/desktop-app-2.jpg'" alt="Screenshot" class="img-fluid rounded shadow-lg border">
                </div> -->
                </div>
            </div>


            <div class="w-50 h-50 bottom left position-absolute" v-if="this.$route.params.lang == 'ar'" data-jarallax-element="50" style="position:relative;left:-290px">
                <div class="blob blob-2 bg-gradient w-100 h-100" style="background:linear-gradient(to right, #301b72, #6653ff) !important;"></div>
            </div>
            <div class="w-50 h-50 bottom right position-absolute" v-else data-jarallax-element="50">
                <div class="blob blob-2 bg-gradient w-100 h-100" style="background:linear-gradient(to right, #301b72, #6653ff) !important;"></div>
            </div>
            <!-- <div class="w-50 h-50 bottom right position-absolute" data-jarallax-element="75">
                <div class="blob blob-4 bg-white opacity-10 w-100 h-100"></div>
            </div> -->
            <div id="about-us"></div>
            <div class="divider divider-bottom bg-white" style="height:80px;"></div>
        </section>

        <br>

        <section class="pt-0" style="background-color:#fff;padding-bottom:60px;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h3 class="display-4 text-center" style="padding-top:30px;font-family:ap;color:#6653ff;direction:rtl;" v-if="this.$route.params.lang == 'ar'">{{ $t('about.What') }}</h3>
                <h3 class="display-4 text-center" style="padding-top:30px;font-family:ap;color:#6653ff;direction:ltr;" v-else>{{ $t('about.What') }}</h3>
              </div>
            </div>
            <div class="row" style="padding-top:10px;" v-if="this.$route.params.lang == 'ar'">
              <div class="col-md-12" v-for="setting in settings" :key="setting.id">
                <p style="text-align:justify;line-height:2;direction:rtl;">
                  {{ setting.about_us_ar }}
                </p>
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-md-12" v-for="setting in settings" :key="setting.id">
                <p style="text-align:justify;line-height:2;direction:ltr;">
                  {{ setting.about_us_en }}
                </p>
              </div>
            </div>
            <div id="benefit-steps"></div>
          </div>
        </section>


      <section class="bg-gradient text-white pb-0" style="direction:rtl;padding-top:60px !important" v-if="this.$route.params.lang == 'ar'">
        <div class="container">
          <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4">{{ $t('beneifit.Benifits') }}</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3 mb-md-0" v-for="benifit in benifits" :key="benifit.id">
              <div class="card card-body" style="height:193px;">
                <img :src="'/uploads/'+benifit.image" alt="Utosia logo" class="icon icon-lg ml-3">
                <h5 class="mt-4 text-center" style="color:#6653ff;font-family:ap;">{{ benifit.title_ar }}</h5>
              </div>
              <br>
            </div>
          </div>
        </div>
        <div id="why-steps"></div>
        <div class="divider divider-bottom"></div>
      </section>

      <section class="bg-gradient text-white pb-0" style="direction:ltr;padding-top:60px !important" v-else>
        <div class="container">
          <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4">{{ $t('beneifit.Benifits') }}</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3 mb-md-0" v-for="benifit in benifits" :key="benifit.id">
              <div class="card card-body" style="height:193px;">
                <img :src="'/uploads/'+benifit.image" alt="Utosia logo" class="icon icon-lg ml-3">
                <h5 class="mt-4 text-center" style="color:#6653ff;font-family:ap;">{{ benifit.title_en }}</h5>
              </div>
              <br>
            </div>
          </div>
        </div>
        <div id="why-steps"></div>
        <div class="divider divider-bottom"></div>
      </section>

      <br>
      <br>
      <br>

        
        <section class="pt-0" style="direction:rtl;padding-bottom:30px;" v-if="this.$route.params.lang == 'ar'">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="display-4 text-center" style="color:#6653ff;font-family:ap;padding-bottom:50px;">{{ $t('Why.WhySteps') }}</h3>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3 mb-md-0" v-for="whyStep in whySteps" :key="whyStep.id">
                      <div class="card fahmyCard">
                          <div class="face face1">
                              <div class="content">
                                  <h3>{{ whyStep.title_ar }}</h3>
                              </div>
                          </div>
                          <div class="face face2">
                              <div class="content">
                                  <h5 class="mt-4 text-center" style="color:#fff;font-family:ap;">
                                    {{ whyStep.desc_ar }}
                                  </h5>
                              </div>
                          </div>
                      </div>
                      <br>
                  </div>
                </div>
            </div>
        </section>

        <section class="pt-0" style="direction:ltr;padding-bottom:30px;" v-else>
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="display-4 text-center" style="color:#6653ff;font-family:ap;padding-bottom:50px;">{{ $t('Why.WhySteps') }}</h3>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3 mb-md-0" v-for="whyStep in whySteps" :key="whyStep.id">
                      <div class="card fahmyCard">
                          <div class="face face1">
                              <div class="content">
                                  <h3>{{ whyStep.title_en }}</h3>
                              </div>
                          </div>
                          <div class="face face2">
                              <div class="content">
                                  <h5 class="mt-4 text-center" style="color:#fff;font-family:ap;">
                                    {{ whyStep.desc_en }}
                                  </h5>
                              </div>
                          </div>
                      </div>
                      <br>
                  </div>
                </div>
            </div>
        </section>

    

    <section id="pricing" style="background-color:#fff;padding-top:3rem !important">
      <div class="container">
        <div>
          <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4" style="color:#6653ff;font-family:ap;">{{ $t('packages.Packages') }}</h3>
            </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-center" v-if="this.$route.params.lang == 'ar'">
          <div class="col-sm-9 col-md-7 col-lg-6 mb-3 mb-md-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200" v-for="pack in packages" :key="pack.id">
            <div class="card card-body align-items-center shadow" style="height:600px">
              <div class="text-center mb-4 mt-4">
                <h4 style="color:#6653ff;font-family:ap;">{{ pack.name_ar }}</h4>
                <div class="d-flex align-items-center justify-content-center mb-1">
                  <span class="h5 mb-0 mr-2" style="color:#6653ff;font-family:ap;">SAR</span>
                  <span class="display-3 mb-0 text-dark">{{ pack.price }}</span>
                </div>
                <div>
                  <h5 style="color:#6653ff;font-family:ap;">{{ pack.user_ar }}</h5>
                </div>
              </div>
              <ul class="list-unstyled p-0">
                <li class="my-3" v-for="p in pack.services.slice(0, 5)" :key="p.id">
                  <div class="d-flex align-items-center">
                    <div class="rounded-circle" style="background-color:#6653ff;width:32px;height:32px;">
                      <i class="fas fa-check" style="color:#fff;margin:8px;"></i>
                    </div>
                    <h4 class="mb-0 ml-3" style="color:#6653ff;font-family:ap;">{{ p.service_ar }}</h4>
                  </div>
                </li>
              </ul>
              <router-link :to="`/${i18n.locale}/pricing/`+pack.id" exact>
                <a class="btn btn-lg btn-block btnOfReadMore"><span style="color:#fff;margin:8px;">{{ $t('packages.Read More') }}</span></a>
              </router-link>
            </div>
          </div>
        </div>

        <div class="row justify-content-center align-items-center" v-else>
          <div class="col-sm-9 col-md-7 col-lg-6 mb-3 mb-md-4 mb-lg-0" data-aos="fade-up" data-aos-delay="200" v-for="pack in packages" :key="pack.id">
            <div class="card card-body align-items-center shadow" style="height:600px">
              <div class="text-center mb-4 mt-4">
                <h4 style="color:#6653ff;font-family:ap;">{{ pack.name_en }}</h4>
                <div class="d-flex align-items-center justify-content-center mb-1">
                  <span class="h5 mb-0 mr-2" style="color:#6653ff;font-family:ap;">SAR</span>
                  <span class="display-3 mb-0 text-dark">{{ pack.price }}</span>
                </div>
                <div>
                  <h5 style="color:#6653ff;font-family:ap;">{{ pack.user_en }}</h5>
                </div>
              </div>
              <ul class="list-unstyled p-0">
                <li class="my-3" v-for="p in pack.services.slice(0, 5)" :key="p.id">
                  <div class="d-flex align-items-center">
                    <div class="rounded-circle" style="background-color:#6653ff;width:32px;height:32px;">
                      <i class="fas fa-check" style="color:#fff;margin:8px;"></i>
                    </div>
                    <h4 class="mb-0 ml-3" style="color:#6653ff;font-family:ap;">{{ p.service_en }}</h4>
                  </div>
                </li>
              </ul>
              <router-link :to="`/${i18n.locale}/pricing/`+pack.id" exact>
                <a class="btn btn-lg btn-block btnOfReadMore"><span style="color:#fff;margin:8px;">{{ $t('packages.Read More') }}</span></a>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </section>

    </div>
</template>

<script>
import $ from 'jquery';
import axios from 'axios';
import i18n from "../I18n.js";
import * as home_service from "../services/home_service";
export default {
    name:"Home",
    data: function(){
        return {
            i18n,
            settings:[],
            benifits:[],
            whySteps:[],
            packages:[],
            // services:[],
        }
    },
    mounted(){
      this.getSettings();
      this.getBenifits();
      this.getWhySteps();
      this.getPackages();
      // this.getPackageServices();
    },
    methods: {
      getSettings:async function(){
        try{
          const response = await home_service.getSettings();
          this.settings = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getBenifits:async function(){
        try{
          const response = await home_service.getBenifits();
          this.benifits = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getWhySteps:async function(){
        try{
          const response = await home_service.getWhySteps();
          this.whySteps = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getPackages:async function(){
        try{
          const response = await home_service.getPackages();
          this.packages = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getPackageServices:async function(){
        try{
            const response = await home_service.getPackageServices(4);
            this.services = response.data;
        }catch(error){
          console.log(error);
        }
      }
    },
}
</script>

<style scoped>
.stepsTagRtl{
  font-size: 45px;
  position:relative;
  right:-10px
}
.stepsTagLtr{
  font-size: 45px;
  position:relative;
  right:10px
}
.fahmicoBtn:hover{
  background-color:#301b72;
  border-color:#6653ff;
  color:#fff;
}

.btnOfReadMore{
  background-color:#6653ff;
  font-family:ap;
  color:#fff;
  width:350px;
  height:65px;
  border-radius:36px;
}

@media (max-width: 500px){
  .btnOfReadMore{
    width:250px;
  }
}

.container .fahmyCard{
  height:250px;
  background-color:#fff;
  /* border: 2px solid rgba(0 , 0 , 0 , 0.125); */
  -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
  -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
  box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
}
.container .card .face{ 
    /* width: 300px;  */
    height: 200px; 
    transition: 0.5s; /*Transition time*/
}
.container .card .face.face1{
    position: relative; 
    background: #fff;
    display: flex; 
    justify-content: center; 
    align-items: center; 
    z-index: 1; 
    transform: translateY(100px); /*2D conversion, Y axis movement*/
} 
.container .card:hover .face.face1{ /*Here is the content 1 reset when the card label is hovered*/
    background: #6653ff;
    transform: translateY(0); 
}
.container .card .face.face1 .content{
    opacity: 1; /*transparency*/
    transition: 0.5s; 
}
.container .card:hover .face.face1 .content{ /*Here is the transparency of the cover when hovering the card label*/
    opacity: 1; /*transparency*/
}
.container .fahmyCard:hover{
  background:#fff;
}
.container .card .face.face1 .content h3{
    margin: 10px 0 0; 
    padding: 0; 
    color:#6653ff; 
    text-align: center; /*Font centered*/
    font-size: 1.5em; /*font size*/
}
.container .card:hover .face.face1 .content h3{
    margin: 10px 0 0; 
    padding: 0; 
    color:#fff; 
    text-align: center; /*Font centered*/
    font-size: 1.5em; /*font size*/
}
.container .card .face.face2{
    position: relative; 
    background: #fff; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding: 20px; 
    box-sizing: border-box; /*Set the layout inside the box model, here is the inner margin box border of the element will not affect the final size */
    box-shadow: 0px 0px 0px; /*shadow*/
    transform: translateY(-100px); /*2D conversion, Y axis movement*/
}
.container .card:hover .face.face2{ /*Here is the content 2 reset when the card label is hovered*/
    transform: translateY(0px);
    background: #6653ff;
}
.container .card:hover .face.face2 h5{ /*Here is the content 2 reset when the card label is hovered*/
    color:#6653ff;
}
.container .card .face.face2 h5{
    margin: 0; 
    padding: 0;
    color:#fff;

    /* -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%); */
}

</style>