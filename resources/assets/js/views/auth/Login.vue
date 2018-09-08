<template>
	<div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form @submit.prevent='subm()' @keyup.enter='subm()'>
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control" v-model='loginForm.email' placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" v-model='loginForm.password' placeholder="Password" required="" />
            </div>
            <div>
              
             
              <button class="btn btn-default " >Log In</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
               <router-link  to="/register">
                  <a class="to_register"> Create Account </a>
                </router-link>
              </p>

              <div class="clearfix"></div>
              <br />

            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</template>
<script>
  import helper from '../../services/helper'
	export default{
    data() {
        return{
          loginForm : {
            email : 'ilhampraset30@gmail.com',
            password: '12345678'
          }
        }
    },
    methods : {
      subm(){
                
                axios.post('http://localhost:8000/api/login', this.loginForm).then(response =>  {
                    localStorage.setItem('auth_token',response.data.success.token);
                    //console.log(response.data.success.token)
                    //toastr['success'](response['success'].message);
                    window.location.href='/back-office'
                }).catch(error => {
                    //toastr['error'](error.response.data.message);
                });
                //alert('test')
            }
    }
	}
</script>