<template>
  <b-container fluid>
    <!-- User Interface controls -->
    <b-row>
      <b-col lg="6" class="my-1">
        <b-form-group
          label="Sort"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="sortBySelect"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
              <template v-slot:first>
                <option value="">-- none --</option>
              </template>
            </b-form-select>
            <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="w-25">
              <option :value="false">Asc</option>
              <option :value="true">Desc</option>
            </b-form-select>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Initial sort"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="initialSortSelect"
          class="mb-0"
        >
          <b-form-select
            v-model="sortDirection"
            id="initialSortSelect"
            size="sm"
            :options="['asc', 'desc', 'last']"
          ></b-form-select>
        </b-form-group>
      </b-col>

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
      @filtered="users"
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
  /*@hide="resetInfoModal(infoModal.content[1])" */-->

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



  </b-container>








</template>

<script>
import Vuex from 'vuex';

  export default {
    data() {
      return {
        items: [
        ],
        fields: [
          { key: 'nom', label: 'Person Full name', sortable: true, sortDirection: 'desc' },
          { key: 'adreca', label: 'Person age', sortable: true, class: 'text-center' },
           { key: 'telefon', label: 'telefon', sortable: true, class: 'text-center' },
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
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        test:0,
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        infoModal: {

          rols_id:0,
          Contraseña:'',
          codi:'',
          nom:'',
          id:0
        },
        deleteModal:{
            titulo:'',
            id:0,
            content:''
        }
      }
    },
    computed: {
                   ...Vuex.mapState(['message','count','users','posts','tipoRols']),
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
                     //     this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/alertant');

        this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/usuarios');

    },

    created() {

            //this.$store.dispatch('loadUsers','https://jsonplaceholder.typicode.com/users');
            //this.$store.dispatch('loadUsers','https://jsonplaceholder.typicode.com/posts');
            // this.$store.dispatch('loadUsers','https://pokeapi.co/api/v2/pokemon');
             //this.items=  this.users.length;/
                           this.$store.dispatch('loadRols',' http://127.0.0.1:8000/api/rols');

        this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/usuarios');



    this.pageOptions.push(this.$store.state.count);


  },
  beforeUpdate(){
                  // this.selectedOption=this.getResults
    this.$root.$emit('bv::refresh::table', 'my-table')

    this.pageOptions.push(this.$store.state.count);


  },
    mounted() {
      // Set the initial number of items
     // this.totalRows = users.length
    // this.totalRows = 1;
    /*ACTUALIZAR DATOS */
this.interval = setInterval(function () {
                 this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/usuarios');

            }.bind(this), 1000);

    },
     beforeMount() {
        //SE EJECUTA ANTES DE INSERTAR EL DOM
        console.log('beforeMount');



    },
    methods: {

     ...Vuex.mapMutations(['getallusers','getResults']),
     ...Vuex.mapActions(['getResults']),
       update(item, index, button) {
        this.infoModal.id=index;
        this.infoModal.rols_id=item.rols_id;

         this.infoModal.Contraseña=item.contrasenya;
         this.infoModal.codi=item.codi;
                  this.infoModal.nom=item.nom;

       // console.log(item);
        this.$root.$emit('bv::show::modal', "info-modal", button)
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
            axios.delete('http://127.0.0.1:8000/api/usuarios/' + this.deleteModal.id)
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

                axios.delete('http://127.0.0.1:8000/api/usuarios/' + this.infoModal.index)
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

             axios.put('http://127.0.0.1:8000/api/usuarios/'+ this.infoModal.id,this.infoModal)
             .then(function(response){
                    //me.rols=response.data;
                    this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/usuarios');
                           console.log(this.result);


                })
                .catch(function(error){

    });

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
          // Wrapped in $nextTick to ensure DOM is rendered before closing
          this.$refs.modal.hide()
        })
      },
     eliminar(id) {
        // Exit when the form isn't valid




      axios.delete('http://127.0.0.1:8000/api/usuarios/' + id)
      .then(response => {
                  this.$store.dispatch('loadUsers','http://127.0.0.1:8000/api/usuarios');

        this.result.splice(id, 1)
        console.log(this.result);
      });
    }

    }
  }

</script>
