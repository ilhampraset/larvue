import Vue from 'vue'
import Employess from '../views/employees/'
import EmployeesTable from '../views/employees/employeesTable'
import error404 from '../views/errors/error404'
import Create from '../views/employees/create'
import Login from '../views/auth/Login'
import Register from '../views/auth/Register'
import Loader from '../views/Loader'
import VueRouter from 'vue-router'
import NProgress from 'nprogress';
import Dashboard from './modules/dashboard'
import Admin from '../layouts/admin/Admin-Layout'
import Guest from '../layouts/guest/Guest-Layout'
import helper from '../services/helper'
Vue.use(VueRouter)

 const router = new VueRouter({
    mode: 'history',
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",  
    routes : [
        {
            path : '/back-office',
            component : Admin,
            meta: { requiresAuth: true},
            children: [
                Dashboard,
                {
                   path: 'employees',
                   name: 'employees',
                   component : Employess,
                   children: [
                        {
                            path : '',
                            name : 'employees',
                            component : EmployeesTable,
                            
                        },
                        {
                            path : 'create',
                            name : 'create',
                            component : Create
                        }
                    ] 
                }     
                
            ]
        },
        {
            path: '/',
            component : Guest,
            meta: { requiresGuest: true },
            children : [
                {
                   path: '/',
                   component : Login
                },
                {
                   path: '/login',
                   component : Login
                },
                {
                    path: '/register',
                    component : Register
                }
            ]
        },
        {
            path: '*',
            component : error404,
            children: [
                {
                    path: '*',
                    component: error404                
                }
            ]
        }
    ]
})

router.beforeResolve((to, from, next) => {
  if (to.name) {
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  NProgress.done()
})

router.beforeEach((to, from, next) => {
    var auth = localStorage.getItem('auth_token');
    if (to.matched.some(m => m.meta.requiresAuth)){
        /*return helper.check().then(response => {
            if(!response){
                return next({ path : '/login'})
            }

            return next()
        })*/
        
        if(!auth){
            return next({ path : '/login'})
        }
        return next()
    }

    if (to.matched.some(m => m.meta.requiresGuest)){
       /* return helper.check().then(response => {
            if(response){
                return next({ path : '/'})
            }

            return next()
        })*/
        auth = localStorage.getItem('auth_token');
        if(auth){
            return next({ path : '/back-office'})
        }
        return next()
    }

    return next()
});

export default router;