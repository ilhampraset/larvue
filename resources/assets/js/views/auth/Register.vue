<template>
  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
        <form>
          <h1>Create Account</h1>
          <div>
            <input type="text" class="form-control" placeholder="Username" required="" />
          </div>
          <div>
            <input type="email" class="form-control" placeholder="Email" required="" />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div>
            <a class="btn btn-default submit" href="index.html">Submit</a>
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
               <router-link  to="/login">
                <a class="to_register"> Log in </a>
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
  export default{

  }
</script>