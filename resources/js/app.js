/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
//import VueTailwind from 'vue-tailwind';

window.Vue = require('vue');





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(VueSweetalert2);
//Vue.use(VueTailwind);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('eliminar-publicidad', require('./components/EliminarPublicidad.vue').default);
Vue.component('estado-publicidad', require('./components/EstadoPublicidad.vue').default);
Vue.component('establecimiento', require('./components/Establecimiento.vue').default);
Vue.component('establecimiento-navegacion', require('./components/Establecimientos/EstablecimientoNavegacion.vue').default);
Vue.component('establecimiento-datos', require('./components/Establecimientos/EstablecimientoDatos.vue').default);
Vue.component('establecimiento-cartas', require('./components/Establecimientos/EstablecimientoCartas.vue').default);
Vue.component('establecimiento-qr', require('./components/Establecimientos/EstablecimientoQr.vue').default);
//Vue.component('inicio', require('./components/Inicio.vue').default);

//Vue.component('navegador', require('./components/Navegador.vue').default);

Vue.component('establecimiento-carta', require('./components/Establecimientos/Front/EstablecimientoCarta.vue').default);

Vue.component('foto-obra-dropzone', require('./components/Fotos/FotoObraDropzone.vue').default);
Vue.component('foto-plato-dropzone', require('./components/Fotos/FotoPlatoDropzone.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        isOpen: true,

      }
  
   
});
