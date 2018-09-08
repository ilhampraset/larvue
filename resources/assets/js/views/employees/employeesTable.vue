<template>
<div>
	
	<div class="clearfix"></div>
	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <div class="x_panel">
	      <div class="x_title">
	        <h2>Employees</h2>
	        <ul class="nav navbar-right panel_toolbox">
		      <li> 
		        <button  @click='add()' class="btn btn-primary">Add</button>
		      </li>      
		    </ul> 
	       <div class="clearfix"></div>
	      </div>
	      <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<div class="dataTables_length" id="datatable_length">
	      				<label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm" v-model="filterEmployeesForm.pageLength" @change="getEmployees" v-if="employees.total">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option><option value="100">100</option>
                </select> entries</label>
	      			</div>
	      		</div>
	      		<div class="col-sm-6">
	      			<div id="datatable_filter" >
	      				<label>Search by:
                   <select class="form-control input-sm">
                        <option v-for='emplField in employeesField' :value='emplField'>{{emplField}}</option>
                  </select>
                  <input  class="form-control input-sm" 
                          placeholder="" 
                          aria-controls="datatable" 
                          v-model="filterEmployeesForm.name" 
                          @keyup.enter="getEmployees">
                </label>
	      			</div>
              
	      		</div>
	      	</div>
	      	<div class="row">
	      		<div class="col-sm-12">
              <h6  v-if="employees.total">Total {{employees.total}} result found!</h6>
              <h6  v-else>No result found!</h6>
	      			<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info" v-if="employees.total">
                      <thead>
                        <tr>
                        	<th v-for='empField in employeesField'>{{empField}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for='emp in employees.data' >
                          <td>{{emp.FIRST_NAME +' '+emp.LAST_NAME}}</td>
                          <td>{{emp.JOB_ID}}</td>
                          <td>{{emp.EMAIL}}</td>
                          <td>{{emp.PHONE_NUMBER}}</td>
                          <td>{{emp.HIRE_DATE}}</td>
                          <td>{{emp.SALARY}}</td>
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
            	<div class="col-sm-5">
            		<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of {{employees.total}}entries</div>
            	</div>
            	<div class="col-sm-7">
            		<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                    <pagination :data="employees" :limit=3 @pagination-change-page="getEmployees">
                      <span class="pagination_button" slot="prev-nav">Previous</span>
                      <span slot="next-nav">Next</span>
                    </pagination>
            		</div>
               
            	</div>
            </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
</template>
<script>

import pagination from 'laravel-vue-pagination'
import helper from '../../services/helper'
import {mapActions, mapState} from 'vuex'
export default {

	data(){
		return {
			newName : '',
			user  : this.$store.state.users,
      employees : {},
			filterEmployeesForm: {
                    sortBy : 'start_date',
                    order: 'desc',
                    email: '',
                    all: '',
                    name: '',
                    pageLength: 10
                }


		}
      
		
	},
	mounted() {
     document.title = 'Some new title';
     this.getEmployees()
		 //$( "body" ).removeClass( "nav-md" ).addClass( "nav-sm" );
		
	},
	computed: {
       ...mapState([
          'employeesField'
      ]),
    	value() {
    		return  this.$store.state.users
    	},
    	employesField() {
    		return console.log(this.employeesField)
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
    	test: ()=> {
    		alert('test')
    	},
    	
    	add() {
    		return this.$router.push('/back-office/employees/create')
       /* window.location.href='/back-office/employees/create'*/
    	},
      getEmployees(page) {
              if (typeof page === 'undefined') {
                  page = 1;
              }
              let url = helper.getFilterURL(this.filterEmployeesForm);

              axios.get('https://jsonplaceholder.typicode.com/posts')
                  .then((response) => {
                    this.employees = response.data 
                    console.log(this.employees)
                    //this.$router.push('/back-office/employees?page=' + page)
                  });
          },
    	
    }
}
</script>