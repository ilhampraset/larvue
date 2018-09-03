<template>
<router-view/>
</template>
<script>


import {mapActions} from 'vuex'
export default {

	data(){
		return {
			newName : '',
			user  : this.$store.state.users,
				
		}
		
	},
	mounted() {
		 console.log(this.$store.dispatch('fetch'))
		 //$( "body" ).removeClass( "nav-md" ).addClass( "nav-sm" );
		
	},
	computed: {
    	value() {
    		return  this.$store.state.users
    	},
    	locals() {
    		return 
    	}
    	
    },
    
    methods: {
    	...mapActions([
    		 'changeName',
    		 'fetch'
    	]),
    	change : function() {

    	  localStorage.setItem('name', this.newName)
    	  return this.changeName(this.newName)
    	},
    	/*fetchData : ()=> {
    		return this.fetch()	
    	},*/
    	
    	add() {
    		return this.$router.push('/back-office/employees/create')
    	}
    	
    	
    }
}
</script>