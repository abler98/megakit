
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueAxios from 'vue-axios';
import VueValidator from './plugins/validator';
import VuePNotify from './plugins/pnotify';

window.Vue.use(VueAxios, window.axios);
window.Vue.use(VueValidator);
window.Vue.use(VuePNotify);

Vue.component('admin-car-list', require('./components/admin/cars/CarList.vue'));
Vue.component('admin-car-form', require('./components/admin/cars/CarForm.vue'));

Vue.component('admin-car-owner-form', require('./components/admin/car-owners/CarOwnerForm.vue'));
Vue.component('admin-car-owner-list', require('./components/admin/car-owners/CarOwnerList.vue'));

const app = new Vue({ el: '#app' });
