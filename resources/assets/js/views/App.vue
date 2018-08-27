<template>
  <div>
    <div v-if='auth'>
      <div class="container body">
          <div class="main_container"> 
              <sidebar/> 
              <topnav/>        
              <main-content>
                  <router-view/>
              </main-content>    
              <footer-content/> 
          </div>
      </div>
    </div>
    <div v-else>
      <login/>
    </div>
  </div>    
</template>
<script>
  import Sidebar from "../components/sidebar/Sidebar"
  import TopNav from "../components/TopNav"
  import Login from "../views/auth/Login"
  import Section from "../components/Section"
  import Footer from "../components/Footer"
  export default {
      components : {'sidebar' : Sidebar, 
                    'topnav' : TopNav, 
                    'main-content': Section,
                    'footer-content' : Footer,
                    'login' : Login
                },
      data() {
        return{
          auth : true
        }
      }
      
  }
</script>