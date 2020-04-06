/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import Vue from "vue";

import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "../sass/prueba.css";
import 'es6-promise/auto'
import Vuex from 'vuex';
import { mapState } from 'vuex'

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
//Vue.use(Vuex);
Vue.use(Vuex);
window.Vue = require("vue");
window.axios = require("axios");
//window.Vuex = require("vuex");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "modal-post",
    require("./components/TESTPOSRTDEVAL.vue").default
);



Vue.component("modal", require("./components/modal.vue").default);
Vue.component("calendar", require("./components/calendar.vue").default);
Vue.component("tableJS", require("./components/table.vue").default);
Vue.component("tablecomplexa", require("./components/tablecomplexa.vue").default);
Vue.component("probademodal", require("./components/modalboostrappryeba.vue").default);
Vue.component("sumbittest", require("./components/TestFrancisco.vue").default);

devtool: 'source-map';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
      state: {
        count:0,
        message: 'Hello World',
        users: [],
        alertants:[],
        posts:[],
        tipoRols:[],
        municipis:[],
        tipoRecursos:[],
        tipoAlertant:[],
        recursosMobile:[],
        modalVisible: false,
        modalComponent: null,

      },
    getters:{
        getUsers:  state => {
            return state.users.length;

}
},
    actions: {


        loadUsers({commit},url) {

          axios.get(url).then(result => {
                //hacer switch

                if(url.includes("alertant")){

                    commit('SAVE_USERS',result.data);
                }
                else if(url.includes("recurso")){
                    commit('SAVE_USERS',result.data);
                }
                else if(url.includes("rols")){
                    commit('SAVE_ROLS',result.data);
                }
                else if(url.includes("TipusR")){

                  commit('SAVE_RECURSOS',result.data);
                }
                else if(url.includes("municipi")){
                    commit('SAVE_MUNICIPI',result.data);
                }
                else if(url.includes("TipusA")){
                    commit('SAVE_TIPOALERTANT',result.data);
                }


                console.log(url);


/*
              this.$store.dispatch('loadRols',' http://127.0.0.1:8000/api/rols');
               this.$store.dispatch('loadMunicipi',' http://127.0.0.1:8000/api/municipi');
               this.$store.dispatch('tipuAlertant',' http://127.0.0.1:8000/api/TipusA');
               this.$store.dispatch('loadRecursos',' http://127.0.0.1:8000/api/TipusR');

    },
            switch(url) {
                        case url.includes("alertant"):
                        // code block
                        commit('SAVE_USERS',result.data);
                        break;

                        default:
                        // code block
        }
*/

          }).catch(error => {
            throw new Error(`API ${error}`);
          });
        },

       /* loadRols({commit},url) {
            axios.get(url).then(result => {

                  commit('SAVE_ROLS',result.data);



            }).catch(error => {
              throw new Error(`API ${error}`);
            });
          },
          loadRecursos({commit},url) {
            axios.get(url).then(result => {

                  commit('SAVE_RECURSOS',result.data);



            }).catch(error => {
              throw new Error(`API ${error}`);
            });
          },

        loadMunicipi({commit},url) {
            axios.get(url).then(result => {

                  commit('SAVE_MUNICIPI',result.data);



            }).catch(error => {
              throw new Error(`API ${error}`);
            });
          },
          tipuAlertant({commit},url) {
            axios.get(url).then(result => {

                  commit('SAVE_TIPOALERTANT',result.data);



            }).catch(error => {
              throw new Error(`API ${error}`);
            });
          },
          loadAlertant({commit},url) {
            axios.get(url).then(result => {

                commit('SAVE_USERS',result.data);



            }).catch(error => {
              throw new Error(`API ${error}`);
            });
          },
          */

    },

    mutations: {
        incrementBy(state, n) {
            state.count += n;
          },

          setShowAlert(state, value) {
            state.showAlert = value
          },
          SAVE_RECURSOS(state,tipoRecursos){
            state.tipoRecursos=tipoRecursos ;
          },
          SAVE_ROLS(state,tipoRols){
            state.tipoRols=tipoRols ;

          },
          SAVE_ALERTAMT(state,alertants){
            state.alertants=alertants;
          },
          disminuir(state) {
            state.count -= 2;
          },
          SAVE_MUNICIPI(state, municipis) {
            state.municipis=municipis ;
          },
          SAVE_USERS(state, users) {
            state.users=users ;
            state.count=users.length;
          },
          SAVE_POSTS(state, posts) {
            state.posts=posts ;
          },
          SAVE_TIPOALERTANT(state, tipoAlertant) {
            state.tipoAlertant=tipoAlertant ;
          },
          SAVE_ALLRECURSOS(state, recursosMobile) {
            state.recursosMobile=recursosMobile ;
          },
          showModal(state, componentName) {
            state.modalVisible = true;
            state.modalComponent = componentName;
          },
          hideModal(state) {
            state.modalVisible = false;
          },
          getResults() {
            //const data = await this.$store.dispatch('loadUsers', 'http://127.0.0.1:8000/api/alertant')
            //do whatever you need with the returned data
            return this.state.users.length;
          }
      },

    });

const app = new Vue({
    el: "#app",
    store
});



     
/*export const store = new Vuex.Store({
    state: {
        flavor: ''
      }
})*/