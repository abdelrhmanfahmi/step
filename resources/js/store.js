import Vue from "vue";
import Vuex from "vuex";
import i18n from "./I18n.js";

Vue.use(Vuex);

export default new Vuex.Store({
    state:{
        apiURL:"http://127.0.0.1:8000/api",
        serverPath:"http://127.0.0.1:8000"
    },
    mutations:{},
    actions:{}
});