<template>
    <b-container fluid>
        <div class="registercenter">
            <div class="row registercenter">
        
                <div class="col-md-4 col-sm-12" style="padding-top: 15px; padding-bottom: 15px;">
                    <div class="card">
                        <div class="card-body" style="padding: 40px;">
                            <h5 class="card-title" style="text-align: center;">REGISTER</h5>
                            <form>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input v-model="formregister.nombre" type="text" class="form-control" id="inputName" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input v-model="formregister.email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="inputPass">Password</label>
                                <input v-model="formregister.password" type="password" class="form-control" id="inputPass" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="inputPassEqual">Repeat the password</label>
                                <input v-model="formregister.repeatpassword" type="password" class="form-control" id="inputPassEqual" placeholder="Repeat the password">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                                
        </div>

    </b-container>
</template>

<script>
import Vuex from 'vuex';

export default {

    data() {
        return {
            formregister: {
                nombre: "",
                email: "",
                password:"",
                repeatpassword: "",
            },
        };
    }
}
</script>