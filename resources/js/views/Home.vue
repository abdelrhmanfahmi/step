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

        <!-- sub_services -->

        <section class="pt-0" style="background-color:#fff;padding-bottom:60px;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h4 class="display-3 text-center" style="color:#6653ff;font-size:60px;">{{ $t('Ease, Safe, Fast') }}</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h5 style="color:#948f8f;" class="text-center">{{ $t('With the Steps system') }}</h5>
              </div>
            </div>
            <br>
            <br>
            <div class="row" v-if="this.$route.params.lang == 'ar'">
              <div class="col-md-2 text-center" v-for="sub_service in sub_services" :key="sub_service.id">
                <img :src="'/uploads/'+sub_service.image" width="50px" height="50px" alt="experiement" />
                <p style="color:#948f8f;">{{ sub_service.title_ar }}</p>
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-md-2 text-center" v-for="sub_service in sub_services" :key="sub_service.id">
                <img :src="'/uploads/'+sub_service.image" width="50px" height="50px" alt="experiement" />
                <p style="color:#948f8f;">{{ sub_service.title_en }}</p>
              </div>
            </div>
          </div>
        </section>

        <!-- about_us -->

        <section class="pt-0" style="background-color:#fff;padding-bottom:60px;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h3 class="display-4 text-center" style="padding-top:30px;font-family:ap;color:#6653ff;direction:rtl;" v-if="this.$route.params.lang == 'ar'">{{ $t('about.What') }}</h3>
                <h3 class="display-4 text-center" style="padding-top:30px;font-family:ap;color:#6653ff;direction:ltr;" v-else>{{ $t('about.What') }}</h3>
              </div>
            </div>
            <div class="row" style="padding-top:10px;" v-if="this.$route.params.lang == 'ar'">
              <div class="d-flex" v-for="setting in settings" :key="setting.id">
                <div class="col-md-6">
                  <img :src="'/uploads/'+setting.about_us_image" class="imageAboutUs" width="500px" height="350px" alt="">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                  <p class="paragraphAboutUs">
                    {{ setting.about_us_ar }}
                  </p>
                </div>
              </div>
            </div>
            <div class="row" v-else>
              <div class="d-flex" v-for="setting in settings" :key="setting.id">
                <div class="col-md-6">
                  <img :src="'/uploads/'+setting.about_us_image" class="imageAboutUs" width="500px" height="350px" alt="">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                  <p class="paragraphAboutUs">
                    {{ setting.about_us_en }}
                  </p>
                </div>
              </div>
            </div>
            <div id="benefit-steps"></div>
          </div>
        </section>



      <!-- benifits -->

      <section class="text-white pb-0" style="direction:rtl;padding-top:60px !important" v-if="this.$route.params.lang == 'ar'">
        <div class="container">
          <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4" style="color:#6653ff;">{{ $t('beneifit.Benifits') }}</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3 mb-md-0" v-for="benifit in benifits" :key="benifit.id">
              <div class="card card-body" style="height:193px;box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);">
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

      <section class="text-white pb-0" style="direction:ltr;padding-top:60px !important" v-else>
        <div class="container">
          <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4" style="color:#6653ff;">{{ $t('beneifit.Benifits') }}</h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3 mb-md-0" v-for="benifit in benifits" :key="benifit.id">
              <div class="card card-body" style="height:193px;box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);">
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

        <!-- why steps -->

        <section class="pt-0" style="direction:rtl;padding-bottom:30px;" v-if="this.$route.params.lang == 'ar'">
            <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="display-4 text-center" style="color:#6653ff;font-family:ap;padding-bottom:50px;">{{ $t('Why.WhySteps') }}</h3>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3 mb-md-0">
                      <div class="d-flex" v-for="(whyStep,index) in whySteps" :key="whyStep.id">
                        <div class="borderNumberWhySteps">
                          <span style="color:#fff;font-size:18px;">{{index+1}}</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p style="font-size:18px;">{{whyStep.title_ar}}</p>
                      </div>
                  </div>
                  <div class="col-md-6" v-for="setting in settings" :key="setting.id">
                    <img :src="'/uploads/'+setting.why_steps_image" class="imageWhySteps" width="500px" height="350px" alt="">
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
                  <div class="col-md-6 mb-3 mb-md-0">
                      <div class="d-flex" v-for="(whyStep,index) in whySteps" :key="whyStep.id">
                        <div class="borderNumberWhySteps">
                          <span style="color:#fff;font-size:18px;">{{index+1}}</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <p style="font-size:18px;">{{whyStep.title_en}}</p>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <img :src="'assets/img/5913-Less.png'" class="imageWhySteps" width="500px" height="350px" alt="">
                  </div>
                </div>
            </div>
        </section>


        <!-- sections -->

        <section class="pt-0" v-if="this.$route.params.lang == 'ar'">
          <div class="container" v-for="(section,index) in sections" :key="section.id">
            <div class="row">
              <div class="col-md-12">
                <h3 class="display-4 text-center" style="color:#6653ff;font-family:ap;">{{ section.title_ar }}</h3>
              </div>
            </div>

            <div class="row" v-if="(index+1)%2 == 0">
              <div class="col-md-6 d-flex align-items-center">
                <p style="font-size:23px;direction:rtl;text-align:justify;color:#948f8f;">{{ section.desc_ar }}</p>
              </div>
              <div class="col-md-6">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="">
              </div>
            </div>

            <div class="row" v-else>
              <div class="col-md-6">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <p style="font-size:23px;direction:rtl;text-align:justify;color:#948f8f;">{{ section.desc_ar }}</p>
              </div>
            </div>
            <br>
            <br>
            <br>
          </div>
        </section>

        <section class="pt-0" v-else>
          <div class="container" v-for="(section,index) in sections" :key="section.id">
            <div class="row">
              <div class="col-md-12">
                <h3 class="display-4 text-center" style="color:#6653ff;font-family:ap;">{{ section.title_en }}</h3>
              </div>
            </div>

            <div class="row" v-if="(index+1)%2 == 0">
              <div class="col-md-6 d-flex align-items-center">
                <p style="font-size:23px;direction:ltr;text-align:justify;color:#948f8f;">{{ section.desc_en }}</p>
              </div>
              <div class="col-md-6">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="">
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-md-6">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <p style="font-size:23px;direction:ltr;text-align:justify;color:#948f8f;">{{ section.desc_en }}</p>
              </div>
            </div>
            <br>
            <br>
            <br>
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
            sub_services:[],
            sections:[]
            // services:[],
        }
    },
    mounted(){
      this.getSettings();
      this.getBenifits();
      this.getWhySteps();
      this.getSubServices();
      this.getSections();
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
      getSubServices:async function(){
        try{
          const response = await home_service.getSubServices();
          this.sub_services = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getSections:async function(){
        try{
          const response = await home_service.getSections();
          this.sections = response.data;
        }catch(error){
          console.log(error);
        }
      }
    },
}
</script>

<style scoped>
.paragraphAboutUs{
  text-align:justify;
  line-height:2;
  direction:rtl;
}
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
.borderNumberWhySteps{
  border:1px solid #bd5ade;
  padding:5px;
  height:32px;
  background-color:#bd5ade;
  border-radius:5px;
  width:25px;
  text-align:center;
}

@media only screen and (width : 1024px){
  .newImageOrders{
    width:480px;
    height:350px;
  }
}

@media screen and (min-width:768px) and (max-width:1000px) {
  .imageAboutUs{
    width:360px;
    height:330px;
  }
  .imageWhySteps{
    width:350px;
    height:300px;
  }
  .newImageOrders{
    width:350px;
    height:350px;
  }
}

@media (max-width: 500px){
  .btnOfReadMore{
    width:250px;
  }
  .imageAboutUs{
    width:200px;
    height:150px;
  }
  .paragraphAboutUs{
    text-align:justify;
  }
  .imageWhySteps{
    width:300px;
    height:250px;
  }
  .newImageOrders{
    width:350px;
    height:200px;
  }
}

@media only screen and (width: 414px){
  .newImageOrders{
    width:380px;
    height:200px;
  }
}

@media only screen and (width: 411px){
  .newImageOrders{
    width:380px;
    height:200px;
  }
}

@media only screen and (width: 393px){
  .newImageOrders{
    width:365px;
    height:200px;
  }
}

@media only screen and (width: 360px){
  .newImageOrders{
    width:330px;
    height:200px;
  }
}

@media only screen and (width: 320px){
  .newImageOrders{
    width:300px;
    height:200px;
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