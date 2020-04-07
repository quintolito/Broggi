<template>
    <b-container fluid>
        <div class="logincenter">
            <div class="row logincenter">
        
                <div class="col-md-4 col-sm-12" style="padding-top: 15px; padding-bottom: 15px;">
                    <div class="card">
                        <div class="card-body" style="padding: 40px;">
                        <h5 class="card-title" style="text-align: center;">LOGIN</h5>
                        <form>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input v-model="formlogin.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input v-model="formlogin.password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                            <input v-model="formlogin.checkmeout" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
            formlogin: {
                email: "",
                password:"",
                checkmeout: false
            },
        };
    }
}

</script>