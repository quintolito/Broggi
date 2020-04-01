<template>
  <b-container fluid>
    <!-- User Interface controls


    <b-form-input list="my-list-id"></b-form-input>

  <datalist id="my-list-id">

    <option v-for="size in municipis" :key="size.id">{{ size.nom }}
      <p>{{size.id}}</p>
    </option>

  </datalist>

-->


    <b-row>




      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filter"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="filterInput"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filter On"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          description="Leave all unchecked to filter on all data"
          class="mb-0">
          <b-form-checkbox-group v-model="filterOn" class="mt-1">
            <b-form-checkbox value="name">Name</b-form-checkbox>
            <b-form-checkbox value="age">Age</b-form-checkbox>
            <b-form-checkbox value="isActive">Active</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>
      </b-col>

      <b-col sm="5" md="6" class="my-1">
        <b-form-group
          label="Per page"
          label-cols-sm="6"
          label-cols-md="4"
          label-cols-lg="3"
          label-align-sm="right"
          label-size="sm"
          label-for="perPageSelect"
          class="mb-0"
        >
          <b-form-select
            v-model="perPage"
            id="perPageSelect"
            size="sm"
            :options="pageOptions"
          ></b-form-select>
        </b-form-group>
      </b-col>

      <b-col sm="7" md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="users.length"
          :per-page="perPage"
          align="fill"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <!-- Main table element -->
    <b-table
    id="my-table"
    ref="table"
      show-empty
      small
      stacked="md"
     :items="users"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filterIncludedFields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
    >




      <template v-slot:cell(actions)="row">

        <b-button size="sm" @click="info(row.item, row.item.id, $event.target)" class="mr-1">
          Info modal
        </b-button>
        <b-button size="sm" @click="update(row.item, row.item.id, $event.target)" class="mr-1">
          Update
        </b-button>
<!--
        <b-button size="sm" @click="eliminar(row.item.id)">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>

      </template>
      <template v-slot:row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>

-->
      </template>

    </b-table>

<!--

 <b-modal
      id="info-delete"
      :title="deleteModal.titulo"
      @show="resetModal"
      @hidden="resetModal"
      @ok="Borrarelemento"
    >

      <form ref="form" @submit.stop.prevent="handleSubmit">

      </form>

    </b-modal>



-->








<!--

    <b-modal :id="infoModal.id" :title="infoModal.title"        @ok="handleOk"  >
      <pre>{{ infoModal.content }}


      </pre>
      </b-modal>
  /*@hide="resetInfoModal(infoModal.content[1])" */

    <b-modal
      id="info-modal"
      ref="modal"
      :title="infoModal.title"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >

      <form ref="form" @submit.stop.prevent="handleSubmit">

        <b-form-group
          label="Codi"
          label-for="name-input"
          invalid-feedback="Codi is required"
        >
          <b-form-input
            id="name-input"
            required
            label=""
             v-model="infoModal.codi"

          ></b-form-input>



      <b-form-group
        id="input-group-1"
        label="Contraseña address:"

        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-1"

        v-model="infoModal.Contraseña"

          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          required
          v-model="infoModal.nom"
            ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Food:" label-for="input-3">
         <select v-model="infoModal.rols_id" name="city" id="city" class="form-control" tabindex="12">
            <option v-for="(city, index) in tipoRols"
                    :key="index"
                    :value="city.id">{{ city.nom }}
            </option>
        </select>
      </b-form-group>








        </b-form-group>
      </form>


    </b-modal>

-->


    <b-modal
      id="modal-recursos2"
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
          id="input-1-recurs"
          v-model="formRecurs.codi"
          required
          placeholder="Enter codi"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="rols:" label-for="input-3">
                <select v-model="formRecurs.tipus_recurs_id" name="recurso" id="recurso" class="form-control" tabindex="12">
            <option v-for="(recurso, index) in tipoRecursos"
                    :key="index"
                    :value="recurso.id">{{ recurso.tipus }}
            </option>
        </select>

      </b-form-group>

      </form>
    </b-modal>




<!-- FORM PARA ALERTANT -->

    <b-modal
      id="modal-alertant2"
            ref="modal"

      title="Submit Your Name"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">



      <b-form-group
        id="input-group-1"
        label="Nom"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-1"
          v-model="formAlertant.nom"
          required
          placeholder="Enter codi"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="adreca" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formAlertant.adreca"
          required
          placeholder="Enter nom"
        ></b-form-input>
      </b-form-group>
  <b-form-group id="input-group-5" label="telefon" label-for="input-5">
        <b-form-input
          id="input-5"
          v-model="formAlertant.telefon"
          required
          placeholder="Enter contrasenya"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="municipis_id" label-for="input-3">



                <select v-model="formAlertant.municipis_id" name="municipi" id="municipi" class="form-control" tabindex="12">
            <option v-for="(municipi, index) in municipis"
                    :key="index"
                    :value="municipi.id">{{ municipi.nom }}
            </option>
        </select>


<!-- cAMBIAR POR DATALIST PERO SE LAGEA
  <b-form-input  v-model="formAlertant.municipis_id"  name="municipi" id="municipi" list="my-list-id"></b-form-input>

  <datalist id="my-list-id" >
    <option>Manual Option</option>
    <option v-for="municipi in municipis " :key="municipi.id">{{ municipi }}</option>



  </datalist>
-->
      </b-form-group>



  <b-form-group id="input-group-4" label="tipus_alertant_id" label-for="input-3">
                <select v-model="formAlertant.tipus_alertant_id" name="city" id="city" class="form-control" tabindex="12">
            <option v-for="(city, index) in tipoAlertant"
                    :key="index"
                    :value="city.id">{{ city.tipus }}
            </option>
        </select>

      </b-form-group>


<!--
  <b-form-input  v-model="formAlertant.municipis_id"  name="municipi" id="municipi" list="my-list-id"></b-form-input>

  <datalist id="my-list-id" >

    <option v-for="(municipi, index) in municipis"
                    :key="index"
                    :value="municipi.nom">

    </option>

  </datalist>
-->


      </form>

    </b-modal>

 <p>{{users.tipus_alertant}}</p>
  </b-container>








</template>

<script>
import Vuex from 'vuex';

  export default {
         props: ['api','tablaccion'],
    data() {
      return {
          testfields: ['nom', 'last_name', 'age'],
          dataReady: false,
        items: [

        ],
        fields: [
          { key: 'nom', label: 'nom', sortable: true, sortDirection: 'desc' },
          { key: 'adreca', label: 'Person age', sortable: true, class: 'text-center' },
          { key: 'telefon', label: 'telefon', sortable: true, class: 'text-center' },
         // { key: 'municipis_id', label: 'municipis', sortable: true, class: 'text-center' },
         // { key: 'municipis_id', label: 'nom', sortable: true, class: 'text-center' },

        { key: 'municipi.nom', label: 'municipi', sortable: true, class: 'text-center' },
        { key: 'tipus_alertant.tipus', label: 'tipus_alertant', sortable: true, class: 'text-center' },

          {
            key: 'isActive',
            label: 'is Active',
            formatter: (value, key, item) => {
              return value ? 'Yes' : 'No'
            },
            sortable: true,
            sortByFormatted: true,
            filterByFormatted: true
          },
          { key: 'actions', label: 'Actions' }
        ],
        click:0,
        //totalRows: 1,
        VALOR:0,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        test:0,
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: '',
        filterOn: [],
        Pruebamunicipi:[],
        infoModal: {

          rols_id:0,
          Contraseña:'',
          codi:'',
          nom:'',
          id:0
        },
         formAlertant: {
                id:0,
                nom:"",

                adreca:'',
                municipis_id:null,

                telefon:'',
                tipus_alertant_id:null


            },
           formRecurs: {
                id:0,
                codi:"",
                tipus_recurs_id:null

            },
        deleteModal:{
            titulo:'',
            id:0,
            content:''
        }
      }
    },
    computed: {
                   ...Vuex.mapState(['message','count','users','posts','tipoRols','municipis','tipoAlertant','tipoRecursos']),
         //...Vuex.mapGetters({selectedOption:'getUsers'}),

      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      },



    },
    beforeCreate() {
                        this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/alertant');

        console.log(this.$store.state.users[0])

    },

    created() {

            //this.$store.dispatch('loadUsers','https://jsonplaceholder.typicode.com/users');
            //this.$store.dispatch('loadUsers','https://jsonplaceholder.typicode.com/posts');
            // this.$store.dispatch('loadUsers','https://pokeapi.co/api/v2/pokemon');
             //this.items=  this.users.length;/
               this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/alertant');

        /*if(this.api =="alertant"){
                    this.$store.dispatch('loadAlertant','http://127.0.0.1:8000/api/'+this.api );


        }else{
        this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/'+this.api );
        }*/


  console.log( this.Pruebamunicipi[0]);
    this.pageOptions.push(this.$store.state.count);

        console.log(this.$store.state.users[0])

  },
  beforeUpdate(){
                  // this.selectedOption=this.getResults

    this.$root.$emit('bv::refresh::table', 'my-table')

    this.pageOptions.push(this.$store.state.count);


  },
    updated() {
        //SE EJECUTA CUÁNDO SE RALIZAN LOS CAMBIOS
                                        // this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/alertant');

        console.log('update');
    },
 async mounted() {

    this.get();
    this.dataReady = true;
},
     beforeMount() {
        //SE EJECUTA ANTES DE INSERTAR EL DOM
        console.log('beforeMount');


                                 this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/alertant');


    },
    methods: {
          makeToast(variant = null) {
        this.$bvToast.toast('Toast body content', {
          title: `Variant ${variant || 'default'}`,
          variant: variant,
          solid: true
        })
      },
 get () {
      return this.Pruebamunicipi=this.$store.state.users

      console.log(this.$store.state.users);
    },
     ...Vuex.mapMutations(['getallusers','getResults']),
     ...Vuex.mapActions(['getResults']),
       update(item, index, button) {
           //console.log(item);
             console.log(item);
        if(this.tablaccion=="rols"){
        this.infoModal.id=index;
        this.infoModal.rols_id=item.rols_id;

         this.infoModal.Contraseña=item.contrasenya;
         this.infoModal.codi=item.codi;
                  this.infoModal.nom=item.nom;
        }
        else if(this.tablaccion=="recursos"){
         /*   console.log(this.formRecurs);
                        console.log(this.item);*/

         this.formRecurs.id=index;

         this.formRecurs.codi=item.codi;
         this.formRecurs.tipus_recurs_id=item.tipus_recurs_id;


        //this.$root.$emit('bv::show::modal', "modal-recursos2", button)
        }
        else if(this.tablaccion=="alertant"){
                this.formAlertant.id=index;
                this.formAlertant.nom=item.nom;
                 this.formAlertant.adreca=item.adreca;
                  this.formAlertant.telefon=item.telefon;
                  this.formAlertant.municipis_id=item.municipi.id;
                  this.formAlertant.tipus_alertant_id=item.tipus_alertant.id;

                   console.log(this.formAlertant);
                      this.$root.$emit('bv::show::modal', "modal-alertant2", button)

            }



       console.log(item);
                          console.log(this.formAlertant);


      },
      info(item, index, button) {
        this.deleteModal.id = index
        this.$bvModal.msgBoxOk(`Esta seguro que desea borrar este elemento.  Row index: ${index}`, {
          title: 'Confirmation',
          size: 'sm',
          buttonSize: 'sm',
          okVariant: 'success',
          headerClass: 'p-2 border-bottom-0',
          footerClass: 'p-2 border-top-0',
          centered: true
        }).then(value => {
              console.log( this.deleteModal.id);
                 var vm = this
            axios.delete('http://127.0.0.1:8000/api/'+this.api +'/'+ this.deleteModal.id)
            .then(response => {
                        /*const prueba = this.users.findIndex(user => user.id === id) // find the post index
                        if (~prueba) // if the post exists in array
                            this.users.splice(prueba, 1) //delete the post

                console.log(this.result);*/





            });          })
          .catch(err => {
            // An error occurred
          });
        console.log(this.$refs.table.refresh());
        this.$refs.table.refresh();
        //console.log();
      },
      UpdateFORMS(Apiactuar,RecibirObjeto) {
          console.log("RECIBIROBKETO")
        console.log(RecibirObjeto);
      return axios.put('http://127.0.0.1:8000/api/'+Apiactuar +'/'+ RecibirObjeto.id,RecibirObjeto)
             .then(function(response){
                    //me.rols=response.data;

                           console.log(this.result);
                            this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/'+Apiactuar);


                })
                .catch(function(error){

    });
    },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        //this.totalRows = users.length;
        this.currentPage = 1;
      },
       selectedOption () {
    return pageOptions.push(this.$store.state.users.length);
  },
  checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        this.nameState = valid
        return valid
      },
      resetModal() {
        this.name = ''
        this.nameState = null


      },
      Borrarelemento(bvModalEvt){
          bvModalEvt.preventDefault()
               // console.log(this.infoModal);

                axios.delete('http://127.0.0.1:8000/api/'+this.nombreApi + this.infoModal.index)
            .then(response => {
                        const prueba = this.items.findIndex(item => items.id === id) // find the post index
                        if (~prueba) // if the post exists in array
                            this.items.splice(prueba, 1) //delete the post

                console.log(this.result);
            });

          this.handleSubmit();


      },
      handleOk(bvModalEvt) {
        // Prevent modal from closing


        bvModalEvt.preventDefault()
               // console.log(this.infoModal);
    console.log(this.api);
        console.log(this.formRecurs);
        if(this.api=="recurso"){
        this.UpdateFORMS(this.api,this.formRecurs);
        }
        else if(this.api=="alertant"){
             this.UpdateFORMS(this.api,this.formAlertant);

          this.handleSubmit();
        }



          this.handleSubmit();

      },
      handleSubmit() {
        // Exit when the form isn't valid

         console.log("cerrar modal");
        console.log(this.infoModal);
      // location.reload();



        // Push the name to submitted names
        // Hide the modal manually
        this.$nextTick(() => {
            this.popToast();
          // Wrapped in $nextTick to ensure DOM is rendered before closing
          this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/'+this.api);
          this.$refs.modal.hide()
        })
      },
     eliminar(id) {
        // Exit when the form isn't valid




      axios.delete('http://127.0.0.1:8000/api/usuarios/' + id)
      .then(response => {
                  this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/'+this.nombreApi);

        this.result.splice(id, 1)
        console.log(this.result);
      });
    },
      popToast() {
        // Use a shorter name for this.$createElement
        const h = this.$createElement
        // Increment the toast count
        this.VALOR++
        // Create the message
        const vNodesMsg = h(
          'p',
          { class: ['text-center', 'mb-0'] },
          [
            h('b-spinner', { props: { type: 'grow', small: true } }),
            ' Flashy ',
            h('strong', 'toast'),
            ` message #${this.count} `,
            h('b-spinner', { props: { type: 'grow', small: true } })
          ]
        )
           // Create the title
        const vNodesTitle = h(
          'div',
          { class: ['d-flex', 'flex-grow-1', 'align-items-baseline', 'mr-2'] },
          [
            h('strong', { class: 'mr-2' }, 'The Title'),
            h('small', { class: 'ml-auto text-italics' }, '5 minutes ago')
          ]
        )
        // Pass the VNodes as an array for message and title
        this.$bvToast.toast([vNodesMsg], {
          title: [vNodesTitle],
          solid: true,
          variant: 'success'
        })
      }
    }


  }

</script>
