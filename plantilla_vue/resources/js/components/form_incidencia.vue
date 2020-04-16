<template>
  <div>
    <form ref="form" @submit.stop.prevent="handleSubmit">

       <!-- Afectat -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-1" label="Form afectat" label-for="input-1">
        <!--  
          <b-button  @click="modalAfectat = !modalAfectat" ref="botoAfectat">
            FORM AFECTAT
          </b-button> 
        -->
        <modal-post tipoaccion= "afectats"></modal-post>
      </b-form-group> 

      <!-- Num Inciedncia -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-1" label="Numero incidència" label-for="input-1">
        <b-form-input
          id="input-num-incidencia"
          v-model="formIncidencia.num_incidencia"
          required
          placeholder="00000000000"
          type="number"
        ></b-form-input>
      </b-form-group>

      <!-- Data -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-2" label="Data" label-for="input-1">
        <b-form-input
          id="input-data"
          v-model="formIncidencia.data"
          required
          placeholder="Data de la incidecnia"
          type="date"
        ></b-form-input>
      </b-form-group>

      <!-- Hora -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-3" label="Hora d'alerta" label-for="input-3">
        <b-form-input
          id="input-hora"
          v-model="formIncidencia.hora"
          required
          placeholder="0"
          type="time"
        ></b-form-input>
      </b-form-group>

      <!-- Tipus d'alertant -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-4" label="Tipus d'alertant" label-for="input-3">
        <select
          v-model="formIncidencia.tipus_alertant_id"
          name="city"
          id="tipus-alertant"
          class="form-control"
          tabindex="12"
        >
          <option
            v-for="(city, index) in tipoAlertant"
            :key="index"
            :value="city.id"
          >{{ city.tipus }}</option>
        </select>
      </b-form-group>

      <!-- Alertants/Hospitals -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-5" label="Hospitals/Alertants" label-for="input-3">
        <!-- 
        <select
          v-model="formIncidencia.alertants_id"
          name="municipi"
          id="municipi"
          class="form-control"
          tabindex="12"
        >
          <option
            v-for="(alertant, index) in alertants"
            :key="index"
            :value="alertant.id"
          >{{ alertant.nom }}</option>
        </select>-->

        <b-button  @click="modalHospitals = !modalHospitals" ref="botoHospital">
          Selecionar Hospital
        </b-button>
      </b-form-group>

      <!-- Telefon alertant -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-8" label="Telefon alertant" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.telefon_alertant"
          required
          placeholder="000-000-000"
          type="number"
        ></b-form-input>
      </b-form-group>

      <!-- Municipi -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-5" label="Municipi" label-for="input-3">
        <!-- 
        <select
          v-model="formIncidencia.municipis_id"
          name="municipi"
          id="municipi"
          class="form-control"
          tabindex="12"
        >
          <option
            v-for="(municipi, index) in municipis"
            :key="index"
            :value="municipi.id"
          >{{ municipi.nom }}</option>
        </select>
        -->

        <b-button  @click="modalMunicpis = !modalMunicpis" ref="botoMunincpi">
          Selecionar Municipi
        </b-button> 
      </b-form-group>

      <!-- Adreça -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-6" label="Adreça" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.adreca"
          required
          placeholder="Adreça"
          type="text"
        ></b-form-input>
      </b-form-group>

      <!-- Complement Adreça -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-7" label="Complemnet Adreça" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.complement_adreca"
          required
          placeholder="Informacio complemntaria sobre l'adreça"
          type="text"
        ></b-form-input>
      </b-form-group>

      <!-- Tipus incident -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-8" label="Tipus icidència" label-for="input-2">
        <select
          v-model="formIncidencia.tipus_incident_id"
          name="tipus_incidencia"
          id="tipus_incidencia"
          class="form-control"
          tabindex="12"
        >
          <option
            v-for="(tipoIncidente, index) in tipoIncidentes"
            :key="index"
            :value="tipoIncidente.id"
          >{{ tipoIncidente.tipus }}</option>
        </select>
      </b-form-group>

      <!-- Descripcio -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-8" label="Descripció" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.descripcio"
          required
          placeholder="Què ha passat?"
          type="text"
        ></b-form-input>
      </b-form-group>

      <!-- Recurs mòbil -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-9" label="Recurs mòbil" label-for="input-3">
        <b-button  @click="modalRecursos = !modalRecursos" ref="botoRecurs">
          Selecionar Recurs Mòbil
        </b-button> 
      </b-form-group>
    </form>

    <button type="submit" v-on:click="postIncidencia()" class="btn boto-primari">Guardar Incidencia</button>

    <!-- MODAL PARA Hospital -->
    <b-modal
      id="modal-hospital"
      title="Seleciona un hospital"
      size="xl"

      v-model="modalHospitals"
      
    >
      <taula-form :current_items="alertants" 
        col1="id"
        col2="nom"
        col3="adreca"
        col4="municipis_id"
        col5="telefon"
        
        @tancar-modal="tancarModal">

      </taula-form>
      
    </b-modal>

    <!-- MODAL PARA Municipis -->
    <b-modal
      id="modal-municipi"
      title="Seleciona un municipi"
      size="xl"

       v-model="modalMunicpis"
    >
      <taula-form :current_items="municipis" 
        col1="id"
        col2="nom"
        col3="comarques_id"
        @tancar-modal="tancarModal">

      </taula-form>
      
    </b-modal>

    <!-- MODAL PARA Recursos -->
    <b-modal
      id="modal-recurs"
      title="Seleciona un recurs mòbil"
      size="xl"

       v-model="modalRecursos"
    >
      <taula-form :current_items="recursos" 
        col1="id"
        col2="codi"
        col3="tipus_recurs_id"
        col4="id_usuario"
        col5="recursosid"
        col6="recursosid.tipus"
        @tancar-modal="tancarModal">

      </taula-form>
      
    </b-modal>

  </div>
</template>
<script>
import Vuex from "vuex";
import TaulaForm from './taula_form.vue';
export default {
  props: ["tipoaccion", "alertant", "test"],
  data() {
    return {
      formIncidencia: {
        num_incidencia: null,
        data: null,
        hora: "",
        tipus_alertant_id: null,
        alertants_id: null,
        
        telefon_alertant: "",

        municipis_id: null,
        adreca: "",
        complement_adreca: "",
        
        tipus_incident_id: null,
        // recurs_mobil: "",
        descripcio: "",

        estats_incidencia_id: "1",
        recurs_mobil_id: null,
      },
      formAfectat:{
        cip: "",
        telefon: "",
        edat: null,
        sexe: null,
        nom: "",
        cognoms: "",
        tenir_tarjeta: null,
        municipis_id: null

      },
      modalHospitals: false,
      modalMunicpis: false,
      modalRecursos: false,
      errors: []
    };
  },
  computed: {
    ...Vuex.mapState([
      "message",
      "alertants",
      "count",
      "users",
      "posts",
      "tipoRols",
      "municipis",
      "tipoAlertant",
      "tipoIncidentes",
      "recursos"
    ])
  },
  methods: {
    // post incidencia
    postIncidencia() {
      axios
        .post("http://127.0.0.1:8000/api/incidencias", this.formIncidencia)
        .then(function(response) {
          console.log(response);
          alert("todo ok");
        })
        .catch(function(error) {
          this.errors.push(error.response.data);
          console.log(error.response.data);
        });
    },
    // tancar modal
    tancarModal(item){
      //alert(item.id);
      //input = this.$refs['input-alertant'];
      if(this.modalHospitals){
        this.modalHospitals = false;
        this.$refs.botoHospital.textContent = item.nom;
        this.formIncidencia.alertants_id = item.id
      }else if(this.modalMunicpis){
        this.modalMunicpis = false;        
        this.$refs.botoMunincpi.textContent = item.nom;
        this.formIncidencia.municipis_id = item.id
      }else if(this.modalRecursos){
        this.modalRecursos = false;        
        this.$refs.botoRecurs.textContent = item.nom;
        this.formIncidencia.recurs_mobil_id = item.id
      }else{
        this.modalAfectat = false;
      }     
    },
  },
  created() {
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/rols");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/municipi");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/TipusA");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/alertant");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/TipusI");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/recurso");
  },
  beforeCreate() {},
  mounted() {
    console.log(this.test);
  }
};
</script>
<style scoped>
table {
  width: 100%;
}
</style>
