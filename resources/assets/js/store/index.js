import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const api = 'http://localhost:8000/api/employees'


const store = new Vuex.Store({
  state: {
    count: 0,
    users : {name: 'jhon doe', email:'ho@gmail.com', number:'0812121'},
    employees : []
  },
  getters: {
    count : state => state.count + 2,
  },
  mutations: {
    increment : state =>state.count++,
    decrement: state => state.count--,
    changeName: (state, name) => { state.users.name = name},
    FETCH_EMPLOYEES(state, employees) {
            state.notes = employees;
        }
  },
  actions:{
  	changeName : ({commit}, name) => setTimeout(()=>{
  					commit('changeName', name)
  				}, 1000),
  	fetch({ commit }) {
            return axios.get(api)
			        	.then(r =>  console.log(r.data))
			        	.catch()
        },
  					
  				
  }
})


export default store;