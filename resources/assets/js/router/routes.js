import Vue from 'vue'
import Hello from '../views/Hello'
import Create from '../views/Create'
import Login from '../views/auth/Login'
import Signup from '../views/auth/Login'
import Loader from '../views/Loader'
import VueRouter from 'vue-router'
import NProgress from 'nprogress';
import Dashboard from './modules/dashboard.js'
Vue.use(VueRouter)

 const router = new VueRouter({
    mode: 'history',
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    routes: [
        Dashboard,
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
            children: [
                {
                    path: 'create',
                    name: 'create',
                    component : Create
                },
            ]
        },
        {
            path: '/loader',
            name: 'loader',
            component: Loader,
        },
        {
            path: '/create',
            name: 'create',
            component: Create,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/signup',
            name: 'signup',
            component: Signup,
        },
    ],
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

export default router;