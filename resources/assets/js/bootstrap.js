
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
const tokenn = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU4ZDU5YjVhMjY3ZDdjOGZhYWI0ZTRlZDIzZmEzMTgxMGMwMTMzYWNhYTM3M2M3ZjViN2UwNDc1MjAzMTNmZWFlNmExNjgwYzA5MGY4MWVjIn0.eyJhdWQiOiIxIiwianRpIjoiZThkNTliNWEyNjdkN2M4ZmFhYjRlNGVkMjNmYTMxODEwYzAxMzNhY2FhMzczYzdmNWI3ZTA0NzUyMDMxM2ZlYWU2YTE2ODBjMDkwZjgxZWMiLCJpYXQiOjE1MzUyMjQ0MjQsIm5iZiI6MTUzNTIyNDQyNCwiZXhwIjoxNTY2NzYwNDI0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.nJ4NSl0O-5qjmKYsM4g82yeOqy9Q2uZH1vVh5pgUVJtlM0QPaHGphOuL34W4Tlb0a8OBZWbzH4NQPw_L_xGJLa3RmIS-j1I89oEDdAW5DPuTj5rfnME6MumyvRZeL_kaPEh1te0LFxB112vOQ9e6LpzYdZJytxljrbb8WERg8kjvCYY_k3PTiG-V6L2FivSMEL47lpOzwi7tSE3z9cn-EfvScFBWZfdZ8A8xqg4LjkR3eFH42V4NOwXshP_vC7MwUXIYK69fyUHUKBVfKxX5hiblX1LqIxb1_DsHZGzRf3dq4hOuznuS6yJuZjLqrNSGoMivpm50cFzf_xzbrGY72DUTFZ_J9a_QEGHvyoz6xUp_A07RCxNVY9O3agght1h4M62mkAgPC2Bz7vYyyO_1DGBu3QMNrtr7wGNPeVNztJ82-4kh0icN89XOVEzAtG5jz6-tnCIMrgvUb7U_Lr_9oHG3bBsEunavKBTEe-SfR75QViEW0Cr4Wc6LydKtqNNn7Cj24xA8ouZsjX24ypztDczD4qVidhCNHN2R3fkrh3VMeE1b6OuaNOTytRxvBhNEoR5d4TE-lrxPqNmWrt_yIZ6rwv0XWsFCV8gQZbxw6MapyuQ4QEEpNrf_mlDSLjcjR91DSymIrzCBZGmOhWeorvYm_G_3-SEyVs5DLD_hreE' 
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 window.axios.defaults.headers.common['Authorization'] = "Bearer" +' '+ 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU4ZDU5YjVhMjY3ZDdjOGZhYWI0ZTRlZDIzZmEzMTgxMGMwMTMzYWNhYTM3M2M3ZjViN2UwNDc1MjAzMTNmZWFlNmExNjgwYzA5MGY4MWVjIn0.eyJhdWQiOiIxIiwianRpIjoiZThkNTliNWEyNjdkN2M4ZmFhYjRlNGVkMjNmYTMxODEwYzAxMzNhY2FhMzczYzdmNWI3ZTA0NzUyMDMxM2ZlYWU2YTE2ODBjMDkwZjgxZWMiLCJpYXQiOjE1MzUyMjQ0MjQsIm5iZiI6MTUzNTIyNDQyNCwiZXhwIjoxNTY2NzYwNDI0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.nJ4NSl0O-5qjmKYsM4g82yeOqy9Q2uZH1vVh5pgUVJtlM0QPaHGphOuL34W4Tlb0a8OBZWbzH4NQPw_L_xGJLa3RmIS-j1I89oEDdAW5DPuTj5rfnME6MumyvRZeL_kaPEh1te0LFxB112vOQ9e6LpzYdZJytxljrbb8WERg8kjvCYY_k3PTiG-V6L2FivSMEL47lpOzwi7tSE3z9cn-EfvScFBWZfdZ8A8xqg4LjkR3eFH42V4NOwXshP_vC7MwUXIYK69fyUHUKBVfKxX5hiblX1LqIxb1_DsHZGzRf3dq4hOuznuS6yJuZjLqrNSGoMivpm50cFzf_xzbrGY72DUTFZ_J9a_QEGHvyoz6xUp_A07RCxNVY9O3agght1h4M62mkAgPC2Bz7vYyyO_1DGBu3QMNrtr7wGNPeVNztJ82-4kh0icN89XOVEzAtG5jz6-tnCIMrgvUb7U_Lr_9oHG3bBsEunavKBTEe-SfR75QViEW0Cr4Wc6LydKtqNNn7Cj24xA8ouZsjX24ypztDczD4qVidhCNHN2R3fkrh3VMeE1b6OuaNOTytRxvBhNEoR5d4TE-lrxPqNmWrt_yIZ6rwv0XWsFCV8gQZbxw6MapyuQ4QEEpNrf_mlDSLjcjR91DSymIrzCBZGmOhWeorvYm_G_3-SEyVs5DLD_hreE' ;
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
