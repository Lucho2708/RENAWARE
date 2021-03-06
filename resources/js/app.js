
require('./bootstrap');

window.Vue = require('vue');

/**
* Se realiza el registro de los componentes
* relacionado a la vista y ruta de Php
*/
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('employee-create-component', require('./components/employee/CreateComponent.vue').default);
Vue.component('position-create-component', require('./components/position/CreateComponent.vue').default);
Vue.component('employee-lsit-component', require('./components/employee/ListComponent.vue').default);
Vue.component('position-list-component', require('./components/position/ListComponent.vue').default);
Vue.component('employee-modal'. require ('./components/employee/Modal.vue').default);
Vue.component('position-modal'. require ('./components/position/Modal.vue').default);

const app = new Vue({
    el: '#app',
});
