<template>
  
    <router-view/>
        
</template>
<script>

  export default {
    mounted(){
      $('body').removeClass('nav-md').addClass('login')
    }
      
  }
</script>