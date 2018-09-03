<template>
<div>
	
	<div class="clearfix"></div>

	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2></h2>
	        <div class="clearfix"></div>
	      </div>
	      <div class="x_content">
	      	
	        <form class="form-horizontal form-label-left" novalidate>

	          <div class="item form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
	            </label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" :value="user.name" required="required" type="text">
	            </div>
	          </div>
	          <div class="item form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
	            </label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input type="email" id="email" name="email" :value='user.email' required="required" class="form-control col-md-7 col-xs-12">
	            </div>
	          </div>
	          <div class="item form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span class="required">*</span>
	            </label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	              <input type="number" id="number" :value='user.number' name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
	            </div>
	          </div>
	          <div class="ln_solid"></div>
	          <div class="form-group">
	            <div class="col-md-6 col-md-offset-3">
	              <button type="submit" class="btn btn-primary">Cancel</button>
	              <button id="send" type="submit" class="btn btn-success">Submit</button>
	            </div>
	          </div>
	        </form>
	          
	      </div>
	    </div>
	  </div>
	</div>
</div>
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
    	redi() {
    		 return this.$router.push('/back-office/product/create')
    	}
    	
    	
    }
}
</script>