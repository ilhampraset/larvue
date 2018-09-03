<template>
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
</template>
<script>
  import Sidebar from "./sidebar/Sidebar"
  import TopNav from "./TopNav"
  import Section from "./Section"
  import Footer from "./Footer"
  export default {
      components : {'sidebar' : Sidebar, 
                    'topnav' : TopNav, 
                    'main-content': Section,
                    'footer-content' : Footer,
                    
                },

      mounted(){
        $('.d3-tip').css({"top": "563.002px", "left": "845.061px"})
      }
      
  }
</script>