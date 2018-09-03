
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import router from './router/routes'
import store from './store'
import App from './views/App'
import PageTitle from './components/PageTitle';
import LeftTitle from './components/LeftTitle';
import RightTitle from './components/RightTitle';
import Box from './components/Box';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('page-title', PageTitle);
Vue.component('left-title', LeftTitle);
Vue.component('right-title', RightTitle);
Vue.component('box', Box);


const app = new Vue({
    el: '#app',
    store,
    router, 
    render: h => h(App)
})
