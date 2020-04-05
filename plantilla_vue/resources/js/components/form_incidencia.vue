<template>
  <div>
    <form ref="form" @submit.stop.prevent="handleSubmit">
      <!-- Data -->
      <b-form-group id="input-group-1" label="Data" label-for="input-1">
        <b-form-input
          id="input-1"
          v-model="formIncidencia.data"
          required
          placeholder="Data de la incidecnia"
          type="date"
        ></b-form-input>
      </b-form-group>

      <!-- Nivell incidencia -->
      <b-form-group id="input-group-2" label="Nivell Incidència" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.nivell"
          required
          placeholder="0"
          type="number"
          max="5"
          min="0"
        ></b-form-input>
      </b-form-group>

      <!-- Hora -->
      <b-form-group id="input-group-3" label="Hora de l'incidència" label-for="input-3">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.hora"
          required
          placeholder="0"
          type="time"
        ></b-form-input>
      </b-form-group>

      <!-- Tipus d'alertant -->
      <b-form-group id="input-group-4" label="tipus_alertant_id" label-for="input-3">
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

      <!-- Recurs mòbil -->
      <b-form-group id="input-group-4" label="Recurs mòbil" label-for="input-3">
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
    </form>
  </div>
</template>
<script>
import Vuex from "vuex";
export default {
  props: ["tipoaccion", "alertant", "test"],
  data() {
    return {
      form: {
        codi: 0,
        nom: "",
        contrasenya: "",
        rols_id: null
      },
      rols_id: [],

      formRols: {
        nom: ""
      },
      formIncidencia: {
        nom: "",

        adreca: "",
        municipis_id: null,

        telefon: "",
        tipus_alertant_id: null
      },
      name: "",
      nameState: null,
      submittedNames: []
    };
  },
  computed: {
    ...Vuex.mapState([
      "message",
      "count",
      "users",
      "posts",
      "tipoRols",
      "municipis",
      "tipoAlertant"
    ])
  },
  methods: {
    checkFormValidity() {
      const valid = this.$refs.form.checkValidity();
      this.nameState = valid;
      return valid;
    },
    resetModal() {
      if (this.tipoaccion == "usuarios") {
        this.name = "";
        this.form.nom = "";
        this.form.codi = "";

        this.form.contrasenya = "";
        this.form.rols_id = "";

        this.nameState = null;
      } else if (this.tipoaccion == "alertant") {
        (this.formIncidencia.nom = ""),
          (this.formIncidencia.adreca = ""),
          (this.formIncidencia.telefon = ""),
          (this.formIncidencia.municipis_id = null),
          (this.formIncidencia.tipus_alertant_id = null);
      } else {
        this.formRols.nom = "";
      }
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.handleSubmit();
    },
    handleSubmit() {
      console.log(this.formIncidencia);
      // Exit when the form isn't valid
      if (!this.checkFormValidity()) {
        return;
      }
      // Push the name to submitted names
      console.log(this.tipoaccion);
      axios
        .post(
          "http://127.0.0.1:8000/api/" + this.tipoaccion,
          this.formIncidencia
        )
        .then(function(response) {
          //me.rols=response.data;
          console.log(response);

          alert("Se ha generado correctamente.");
        })
        .catch(function(error) {
          console.log(error);
        });
      // Hide the modal manually
      this.$nextTick(() => {
        if (this.tipoaccion == "usuarios") {
          this.$bvModal.hide("modal-prevent-closing");
        } else if (this.tipoaccion == "alertant") {
          this.$bvModal.hide("modal-Alertant");
        } else {
          this.$bvModal.hide("modalPostRol");
        }
      });
    }
  },
  created() {
    this.$store.dispatch("loadRols", " http://127.0.0.1:8000/api/rols");
    this.$store.dispatch("loadMunicipi", " http://127.0.0.1:8000/api/municipi");
    this.$store.dispatch("tipuAlertant", " http://127.0.0.1:8000/api/TipusA");
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
