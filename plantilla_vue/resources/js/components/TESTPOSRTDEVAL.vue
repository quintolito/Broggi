<template>
  <div>
    <b-button
      class="btn boto-terciari"
      v-if="tipoaccion == 'usuarios'"
      v-b-modal.modal-prevent-closing
    >Open Modal</b-button>

    <!-- Boto PARA ROL -->
    <b-button
      class="btn boto-terciari"
      v-if="tipoaccion == 'alertant'"
      v-b-modal.modal-Alertant
    >Afegeix alertant</b-button>

    <!-- boto PARA Recurso -->
    <b-button
      class="btn boto-terciari"
      v-if="tipoaccion == 'recurso'"
      v-b-modal.modal-recursos
    >Afegeix recurs</b-button>
    <!-- boto PARA Afectat -->
    <b-button
      class="btn boto-terciari"
      v-if="tipoaccion == 'afectat'"
      v-b-modal.modal-afectat
    >Afegeix afectat</b-button>

<!-- MODALS -->
    <!-- FORM PARA ROL -->
    <b-modal
      id="modalPostRol"
      ref="modal"
      title="Submit Your Name"
      @show="resetModal"
      @hidden="resetModal"
      hide-footer
      class="margeninput"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <p class="my-4">Hello from modal!</p>
        <b-form-group id="input-group-2" label="Nom" label-for="input-2">
          <div>
            <b-icon
              v-b-tooltip.focus
              title="Este campo se ha de rellenar con el municipio del alertante"
              icon="question-circle"
              style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
            ></b-icon>
          </div>
          <b-form-input id="input-2" v-model="formRols.nom" required placeholder="Enter nom"></b-form-input>
        </b-form-group>
      </form>
    </b-modal>

    <!-- FORM PARA ALERTANT  ok-only ok-variant="secondary" ok-title="Cancel" -->

    <b-modal
      hide-footer
      class="margeninput"
      id="modal-Alertant"
      ref="modal"
      title="Añade otro alertante/vip "
      @show="resetModal"
      @hidden="resetModal"
    >
      <form inline ref="form" @submit.stop.prevent="onSubmit">
        <b-form-group
          id="input-group-1"
          label="Nom:"
          label-for="input-1"
          label-class="margenform"
          description="We'll never share your email with anyone else."
        >
          <b-form-input
            class="margeninput"
            id="input-1"
            v-model="formAlertant.nom"
            required
            placeholder="Enter codi"
          ></b-form-input>

          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>

        <b-form-group
          id="input-group-2"
          label-class="margenform"
          label="adreca"
          label-for="input-2"
        >
          <b-form-input
            class="margeninput"
            id="input-2"
            v-model="formAlertant.adreca"
            required
            placeholder="Enter nom"
          ></b-form-input>
          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>
        <b-form-group
          id="input-group-5"
          label-class="margenform"
          label="telefon"
          label-for="input-5"
        >
          <b-form-input
            class="margeninput"
            id="input-5"
            v-model="formAlertant.telefon"
            required
            placeholder="Enter contrasenya"
          ></b-form-input>
          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>
        <b-form-group
          id="input-group-3"
          label-class="margenform"
          label="municipis_id"
          label-for="input-3"
        >
          <select
            v-model="formAlertant.municipis_id"
            name="municipi"
            id="municipi"
            class="form-control margeninput"
            tabindex="12"
          >
            <option
              v-for="(municipi, index) in municipis"
              :key="index"
              :value="municipi.id"
            >{{ municipi.nom }}</option>
          </select>
          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>

        <b-form-group
          label-class="margenform"
          id="input-group-4"
          label="tipus_alertant_id"
          label-for="input-3"
        >
          <select
            v-model="formAlertant.tipus_alertant_id"
            name="city"
            id="city"
            class="form-control margeninput"
            tabindex="12"
          >
            <option
              v-for="(city, index) in tipoAlertant"
              :key="index"
              :value="city.id"
            >{{ city.tipus }}</option>
          </select>
          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>
        <div class="d-flex justify-content-center">
          <b-button ref="submit" type="submit" :disabled="busy">Submit</b-button>
        </div>

        <b-overlay :show="busy" no-wrap @shown="onShown" @hidden="onHidden">
          <template v-slot:overlay>
            <div v-if="processing" class="text-center p-4 bg-primary text-light rounded">
              <b-icon icon="cloud-upload" font-scale="4"></b-icon>
              <div class="mb-3">Processing...</div>
              <b-progress
                min="1"
                max="20"
                :value="counter"
                variant="success"
                height="3px"
                class="mx-n4 rounded-0"
              ></b-progress>
            </div>
            <div
              v-else
              ref="dialog"
              tabindex="-1"
              role="dialog"
              aria-modal="false"
              aria-labelledby="form-confirm-label"
              class="text-center p-3"
            >
              <p>
                <strong id="form-confirm-label">Are you sure?</strong>
              </p>
              <div class="d-flex">
                <b-button variant="outline-danger" class="mr-3" @click="onCancel">Cancel</b-button>
                <b-button variant="outline-success" @click="onOK">OK</b-button>
              </div>
            </div>
          </template>
        </b-overlay>
      </form>
    </b-modal>

    <!-- FORM PARA rol -->

    <b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Submit Your Name"
      @show="resetModal"
      @hidden="resetModal"
      hide-footer
    >
      <form ref="form" @submit.stop.prevent="onSubmit">
        <b-form-group
          label-class="margenform"
          id="input-group-1"
          label="codi"
          label-for="input-1"
          description="We'll never share your email with anyone else."
        >
          <b-form-input
            class="margeninput"
            id="input-1"
            v-model="form.codi"
            required
            placeholder="Enter codi"
          ></b-form-input>

          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>

        <b-form-group id="input-group-2" label="Nom" label-for="input-2">
          <b-form-input id="input-2" v-model="form.nom" required placeholder="Enter nom"></b-form-input>
        </b-form-group>
        <b-form-group id="input-group-5" label="contrasenya" label-for="input-5">
          <b-form-input
            id="input-5"
            v-model="form.contrasenya"
            required
            placeholder="Enter contrasenya"
          ></b-form-input>
        </b-form-group>
        <b-form-group id="input-group-3" label="rols:" label-for="input-3">
          <select v-model="form.rols_id" name="city" id="city" class="form-control" tabindex="12">
            <option v-for="(city, index) in tipoRols" :key="index" :value="city.id">{{ city.nom }}</option>
          </select>
        </b-form-group>
      </form>
    </b-modal>

    <!-- FORM PARA RECURSOS -->

    <b-modal
      id="modal-recursos"
      ref="modal"
      title="Submit Your Name"
      @show="resetModal"
      @hidden="resetModal"
      hide-footer
    >
      <form ref="form" @submit.stop.prevent="onSubmit">
        <b-form-group
          label-class="margenform"
          id="input-group-1"
          label="codi"
          label-for="input-1"
          description="We'll never share your email with anyone else."
        >
          <b-form-input
            class="margeninput"
            id="input-1"
            v-model="formNourecurs.codi"
            required
            placeholder="Enter codi"
          ></b-form-input>

          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>

        <b-form-group label-class="margenform" id="input-group-3" label="rols:" label-for="input-3">
          <select
            v-model="formNourecurs.tipus_recurs_id"
            name="city"
            id="city"
            class="form-control margeninput"
            tabindex="12"
          >
            <option
              v-for="(city, index) in tipoRecursos"
              :key="index"
              :value="city.id"
            >{{ city.tipus }}</option>
          </select>
          <b-icon
            v-b-tooltip.focus
            title="Este campo se ha de rellenar con el municipio del alertante"
            icon="question-circle"
            style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "
          ></b-icon>
        </b-form-group>

        <div class="d-flex justify-content-center">
          <b-button ref="submit" type="submit" :disabled="busy">Submit</b-button>
        </div>

      <b-form-group
                    label-class="margenform"

        id="input-group-1"
        label="codi"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
                            class="margeninput"

          id="input-1"
          v-model="formNourecurs.codi"
          required
          placeholder="Enter codi"
        ></b-form-input>

             <b-icon v-b-tooltip.focus title="Este campo se ha de rellenar con el municipio del alertante" icon="question-circle" style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "></b-icon>
      </b-form-group>

      <b-form-group                     label-class="margenform"
 id="input-group-3" label="rols:" label-for="input-3">
                <select  v-model="formNourecurs.tipus_recurs_id" name="city" id="city" class="form-control margeninput" tabindex="12">
            <option v-for="(city, index) in tipoRecursos"
                    :key="index"
                    :value="city.id">{{ city.tipus }}
            </option>
        </select>
 <b-icon v-b-tooltip.focus title="Este campo se ha de rellenar con el municipio del alertante" icon="question-circle" style="width: 37px; height: 32px;     margin-left: 25px;
    margin-top: 2px; "></b-icon>
      </b-form-group>
<div class="d-flex justify-content-center">
         <b-button ref="submit" type="submit" :disabled="busy">Submit</b-button>
      </div>

      <b-overlay :show="busy" no-wrap @shown="onShown" @hidden="onHidden">
        <template v-slot:overlay>
          <div v-if="processing" class="text-center p-4 bg-primary text-light rounded">
            <b-icon icon="cloud-upload" font-scale="4"></b-icon>
            <div class="mb-3">Processing...</div>
            <b-progress
              min="1"
              max="20"
              :value="counter"
              variant="success"
              height="3px"
              class="mx-n4 rounded-0"
            ></b-progress>
          </div>
          <div
            v-else
            ref="dialog"
            tabindex="-1"
            role="dialog"
            aria-modal="false"
            aria-labelledby="form-confirm-label"
            class="text-center p-3"
          >
            <p><strong id="form-confirm-label">Are you sure?</strong></p>
            <div class="d-flex">
              <b-button variant="outline-danger" class="mr-3" @click="onCancel">
                Cancel
              </b-button>
              <b-button variant="outline-success" @click="onOK">OK</b-button>
            </div>
          </div>  
          </template>
        </b-overlay>
      </form>
    </b-modal>

    <!-- FORM PARA RECURSOS -->

  </div>
</template>
<script>
import Vuex from "vuex";
export default {
  props: ["tipoaccion", "alertant", "test"],
  data() {
    return {
      busy: false,
      processing: false,
      counter: 1,
      interval: null,
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
      formAlertant: {
        nom: "",

        adreca: "",
        municipis_id: null,

        telefon: "",
        tipus_alertant_id: null
      },
      formRecurs: {
        codi: "",
        tipus_recurs_id: null
      },
      formNourecurs: {
        codi: "",
        tipus_recurs_id: null
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
      "tipoAlertant",
      "tipoRecursos"
    ])
  },
  methods: {
    checkFormValidity() {
      const valid = this.$refs.form.checkValidity();
      this.nameState = valid;
      return valid;
    },
    clearInterval() {
      if (this.interval) {
        clearInterval(this.interval);
        this.interval = null;
      }
    },
    onShown() {
      // Focus the dialog prompt
      this.$refs.dialog.focus();
    },
    onHidden() {
      // In this case, we return focus to the submit button
      // You may need to alter this based on your application requirements
      this.$refs.submit.focus();
    },
    onSubmit() {
      this.processing = false;
      this.busy = true;
    },
    onCancel() {
      this.busy = false;
    },
    onOK() {
      this.counter = 1;
      this.processing = true;
      // Simulate an async request

      this.clearInterval();
      this.interval = setInterval(() => {
        if (this.counter < 20) {
          this.counter = this.counter + 1;
          this.Actualizar(this.tipoaccion);
        } else {
          this.clearInterval();
          if (this.tipoaccion == "alertant") {
            this.getPosts(this.tipoaccion, this.formAlertant);
          } else if (this.tipoaccion == "recurso") {
            console.log(this.formNourecurs);
            this.getPosts(this.tipoaccion, this.formNourecurs);
          }

          this.$nextTick(() => {
            this.busy = this.processing = false;

            if (this.tipoaccion == "usuarios") {
              this.$bvModal.hide("modal-prevent-closing");
            } else if (this.tipoaccion == "alertant") {
              this.$bvModal.hide("modal-Alertant");
            } else if (this.tipoaccion == "recurso") {
              this.$bvModal.hide("modal-recursos");
            } else {
              this.$bvModal.hide("modalPostRol");
            }
          });
        }
      }, 350);
    },

    getPosts(tipoaccion, formGeneric) {
      console.log(formGeneric);
      return axios
        .post("http://127.0.0.1:8000/api/" + this.tipoaccion, formGeneric)
        .then(function(response) {
          //me.rols=response.data;
          console.log(response);

          this.Actualizar(this.tipoaccion);
        })
        .catch(function(error) {
          console.log(error);
        });
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
        (this.formAlertant.nom = ""),
          (this.formAlertant.adreca = ""),
          (this.formAlertant.telefon = ""),
          (this.formAlertant.municipis_id = null),
          (this.formAlertant.tipus_alertant_id = null);
      } else if (this.tipoaccion == "recurso") {
        (this.formNourecurs.codi = ""),
          (this.formNourecurs.tipus_recurs_id = null);
      } else {
        this.formRols.nom = "";
      }
    },

    Actualizar(Apiactuar) {
      this.$store.dispatch(
        "loadUsers",
        "http://127.0.0.1:8000/api/" + Apiactuar
      );
    },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.handleSubmit();
    },
    handleSubmit() {
      console.log(this.formRecurs);
      this.processing = false;
      this.busy = true;
      // Exit when the form isn't valid
      if (!this.checkFormValidity()) {
        return;
      }
      // Push the name to submitted names
      console.log(this.tipoaccion);
      if (this.tipoaccion == "alertant") {
        this.getPosts(this.tipoaccion, this.formAlertant);
      } else if (this.tipoaccion == "recurso") {
        console.log(this.formRecurs);
        this.getPosts(this.tipoaccion, this.formRecurs);
      }
      // Hide the modal manually
      this.$nextTick(() => {
        if (this.tipoaccion == "usuarios") {
          this.$bvModal.hide("modal-prevent-closing");
        } else if (this.tipoaccion == "alertant") {
          this.$bvModal.hide("modal-Alertant");
        } else if (this.tipoaccion == "recurso") {
          this.$bvModal.hide("modal-recursos");
        } else {
          this.$bvModal.hide("modalPostRol");
        }
      });
    }
  },
  created() {
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/rols");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/municipi");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/TipusA");
    this.$store.dispatch("loadUsers", " http://127.0.0.1:8000/api/TipusR");
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
