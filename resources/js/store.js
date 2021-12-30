import Vue from "vue";
import Vuex from "vuex";
import i18n from "./I18n.js";

Vue.use(Vuex);

export default new Vuex.Store({
    state:{
        apiURL:"https://stepos.herokuapp.com/api",
        serverPath:"https://stepos.herokuapp.com/"
    },
    mutations:{},
    actions:{}
});