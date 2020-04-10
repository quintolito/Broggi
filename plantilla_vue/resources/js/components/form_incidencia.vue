<template>
  <div>
    <form ref="form" @submit.stop.prevent="handleSubmit">
      <!-- Num Inciedncia -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-1" label="Numero incidència" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="formIncidencia.num_incidencia"
          required
          placeholder="00000000000"
          type="number"
        ></b-form-input>
      </b-form-group>

      <!-- Data -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-2" label="Data" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="formIncidencia.data"
          required
          placeholder="Data de la incidecnia"
          type="date"
        ></b-form-input>
      </b-form-group>

      <!-- Hora -->
      <b-form-group label-cols="4" label-cols-md="3" label-cols-xl="2"  id="input-group-3" label="Hora d'alerta" label-for="input-3">
        <b-form-input
          id="input-2"
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
          id="city"
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

        <b-button v-b-modal.modal-hospital>
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
        <b-button v-b-modal.modal_recurs>Selecionar recurs mobil</b-button>
      </b-form-group>
    </form>

    <button type="submit" v-on:click="postIncidencia()" class="btn boto-primari">Dale</button>

    <!-- MODAL PARA Hospital -->
    <b-modal
      id="modal-hospital"
      ref="modal"
      title="Seleciona un hospital"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
      size="xl"
    >
      <taula-form :current_items="alertants" 
        col1="id"
        col2="nom"
        col3="adreca"
        col4="municipis_id"
        col5="telefon">

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
      },
      formAlertant:{
        id: null,
        nom: ""
      },
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
      "tipoIncidentes"
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
    }
  },
  created() {
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/rols");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/municipi");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/TipusA");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/alertant");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/TipusI");
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
