<template>
 <div>
   <!-- <form class="login" @submit.prevent="login">
     <h1>Sign in</h1>
     <label>Email</label>
     <input required v-model="email" type="email" placeholder="Name"/>
     <label>Password</label>
     <input required v-model="password" type="password" placeholder="Password"/>
     <hr/>
     <button type="submit">Login</button>
   </form> -->
   <div class="col-md-6 login-form-1 form">
                    <h3>Sign in</h3>
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <input required v-model="email" type="text" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input required v-model="password" type="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
 </div>
</template>

<script>

import 'bootstrap/dist/css/bootstrap.css'
    export default {
        data(){
      return {
        email : "",
        password : ""
      }
    },
        methods: {
      login: function () {
        let email = this.email 
        let password = this.password
        this.$store.dispatch('login', { email, password })
       .then(() => this.$router.push('/'))
       .catch(err => console.log(err))
      }
    }
    }
</script>

<style>
.form {
  max-width: 1440px;
  height: 600px;
  margin: 0 auto;
  align-items: center;
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
  .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #064717;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
    margin: 0 25%;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #064717;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #064717;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #064717;
    font-weight: 600;
    text-decoration: none;
}

</style>