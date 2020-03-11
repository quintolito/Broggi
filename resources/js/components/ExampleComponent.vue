<template>
    <div>


       <!-- <calendar></calendar>-->
             <p>{{  message}} </p>
             <p>{{  count}} </p>
            <button class="btn btn-primary" @click="incrementBy(5)">+</button>
            <button class="btn btn-danger" @click="disminuir(5)">-</button>
              <div>
    <b-button @click="modalShow = !modalShow">Open Modal</b-button>

    <b-modal v-model="modalShow">Hello From Modal!</b-modal>
  </div>



             <!--<p>{{  users}} </p>-->
 <table class="users" v-if="users.length != 0">
      <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
      </tr>
      <tr v-for="user in users">
        <td>{{user.name}}</td>
        <!--<td>{{user.username}}</td>
        <td>{{user.email}}</td>-->
      </tr>
      <tr></tr>
</table>
 <table class="users" v-else>
      <tr>
        <th>titulo</th>
        <th>descriptcion</th>
      </tr>
      <tr  v-for="post in posts">
        <td>{{post.title}}</td>
        <td>{{post.body}}</td>
      </tr>
    </table>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
            <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1"
                description="We'll never share your email with anyone else."
            >
                <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    required
                    placeholder="Enter email"
                ></b-form-input>
            </b-form-group>

            <b-form-group
                id="input-group-2"
                label="Your Name:"
                label-for="input-2"
            >
                <b-form-input
                    id="input-2"
                    v-model="form.name"
                    required
                    placeholder="Enter name"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Food:" label-for="input-3">
                <b-form-select
                    id="input-3"
                    v-model="form.food"
                    :options="foods"
                    required
                ></b-form-select>
            </b-form-group>

            <b-form-group id="input-group-4">
                <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
                    <b-form-checkbox value="me">Check me out</b-form-checkbox>
                    <b-form-checkbox value="that"
                        >Check that out</b-form-checkbox
                    >
                </b-form-checkbox-group>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
        </b-form>
        <b-card class="mt-3" header="Form Data Result">
            <pre class="m-0">{{ form }}</pre>
        </b-card>
        <!-- Using modifiers -->
        <b-button v-b-modal.my-modal>Show Modal</b-button>

        <!-- Using value -->
        <b-button v-b-modal="'my-modal'">Show Modal</b-button>

        <!-- The modal -->
        <b-modal id="my-modal">Hello From My Modal!</b-modal>
        <!-- The modal
        <modal></modal>
        <tableJS></tableJS>
        <tablecomplexa></tablecomplexa>

        <tableJS></tableJS>-->

        <tablecomplexa></tablecomplexa>

    </div>
</template>

<script>
import Vuex from 'vuex';

export default {

    data() {
        return {
            form: {
                email: "",
                name: "",
                food: null,
                checked: []

            },

            foods: [
                { text: "Select One", value: null },
                "Carrots",
                "Beans",
                "Tomatoes",
                "Corn"
            ],
            show: true,
            modalShow: false

        };
    },
  computed: {
              message() {
                this.test= this.$store.state.message;
                },
                /*...Vuex.mapState(['message']),
                ...Vuex.mapState(['count']),*/
                ...Vuex.mapState(['message','count','users','posts']),
                                //...Vuex.mapState(['posts']),



        },
         created() {

            //this.$store.dispatch('loadUsers','https://jsonplaceholder.typicode.com/users');
            //this.$store.dispatch('loadUsers','https://jsonplaceholder.typicode.com/posts');
                        this.$store.dispatch('loadUsers','https://pokeapi.co/api/v2/pokemon');

  },
    methods: {


        ...Vuex.mapMutations(['incrementBy','disminuir','hideModal']),
        onSubmit(evt) {
            evt.preventDefault();
            alert(JSON.stringify(this.form));
        },
        onReset(evt) {
            evt.preventDefault();
            // Reset our form values
            this.form.email = "";
            this.form.name = "";
            this.form.food = null;
            this.form.checked = [];
            // Trick to reset/clear native browser form validation state
            this.show = false;
            this.$nextTick(() => {
                this.show = true;
            });
        },
        modal(){
              this.hideModal();
        }
    }
};
</script>
<style scoped>
table {
  width: 100%;
}
</style>
