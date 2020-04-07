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
      <b-form-group id="input-group-4" label="Tipus d'alertant" label-for="input-3">
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

      <!-- Municipi -->
      <b-form-group id="input-group-3" label="Municipi" label-for="input-3">
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
      <b-form-group id="input-group-2" label="Adreça" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.adreca"
          required
          placeholder="Adreça"
          type=""
        ></b-form-input>
      </b-form-group>

      <!-- Complement Adreça -->
      <b-form-group id="input-group-2" label="Complemnet Adreça" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formIncidencia.complement_adreca"
          required
          placeholder="Informacio complemntaria sobre l'adreça"
          type="text"
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

      <!-- Recurs mòbil -->
      <b-form-group id="input-group-4" label="Recurs mòbil" label-for="input-3">
        <b-button v-b-modal.modal_recurs>Selecionar recurs mobil</b-button>
      </b-form-group>
    </form>

    <!-- FORM PARA RECURSOS -->
    <b-modal
      id="modal_recurs"
      ref="modal"
      title="Submit Your Name"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          id="input-group-1"
          label="codi"
          label-for="input-1"
          description="We'll never share your email with anyone else."
        >
          <b-form-input id="input-1" v-model="formRecurs.codi" required placeholder="Enter codi"></b-form-input>
        </b-form-group>

        <b-form-group id="input-group-3" label="rols:" label-for="input-3">
          <select
            v-model="formRecurs.tipus_recurs_id"
            name="city"
            id="city"
            class="form-control"
            tabindex="12"
          >
            <option
              v-for="(city, index) in tipoRecursos"
              :key="index"
              :value="city.id"
            >{{ city.tipus }}</option>
          </select>
        </b-form-group>
      </form>
    </b-modal>
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
        data: null,
        hora: "",
        tipus_alertant_id: null,
        telefon: "",

        municipis_id: null,
        adreca: "",
        complement_adreca: "",

        recurs_mobil: "",
        descripcio: ""
      },
      formRecurs: {
        codi: "",
        tipus_recurs_id: null
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
