<template>
  <div>
    <b-button v-b-modal.modal-prevent-closing>Open Modal</b-button>



    <b-modal
      id="modal-prevent-closing"
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
        <b-form-input
          id="input-1"
          v-model="form.codi"
          required
          placeholder="Enter codi"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Nom" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.nom"
          required
          placeholder="Enter nom"
        ></b-form-input>
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
            <option v-for="(city, index) in tipoRols"
                    :key="index"
                    :value="city.id">{{ city.nom }}
            </option>
        </select>

      </b-form-group>










      </form>
    </b-modal>
  </div>
</template>
<script>
import Vuex from 'vuex';
  export default {
    data() {
      return {
            form: {
                codi:0,
                nom:"",
                contrasenya:"",
                rols_id: null
            },
                rols_id: [


            ],
        name: '',
        nameState: null,
        submittedNames: []
      }
    },
    computed:{
                   ...Vuex.mapState(['message','count','users','posts','tipoRols']),


    },
    methods: {
      checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        this.nameState = valid
        return valid
      },
      resetModal() {
        this.name = ''
        this.form.nom='';
        this.form.codi='';

        this.form.contrasenya='';
        this.form.rols_id='';

        this.nameState = null
      },
      handleOk(bvModalEvt) {
        // Prevent modal from closing
        bvModalEvt.preventDefault()
        // Trigger submit handler
        this.handleSubmit()
      },
      handleSubmit() {
        // Exit when the form isn't valid
        if (!this.checkFormValidity()) {
          return
        }
        // Push the name to submitted names
          axios.post('http://127.0.0.1:8000/api/usuarios',this.form).then(function(response){
                    //me.rols=response.data;
                    console.log(response);

                    alert("Se ha generado correctamente.");


                })
                .catch(function(error){
                console.log(error)
                 })
        // Hide the modal manually
        this.$nextTick(() => {
          this.$bvModal.hide('modal-prevent-closing')
        })
      }


    },
    created(){
              this.$store.dispatch('loadRols',' http://127.0.0.1:8000/api/rols');

    },
    beforeCreate(){




    },
    mounted(){

    }

  }
</script>
<style scoped>
table {
  width: 100%;
}
</style>
