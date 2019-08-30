
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('employee-create-component', require('./components/employee/CreateComponent.vue').default);
Vue.component('position-create-component', require('./components/position/CreateComponent.vue').default);
Vue.component('employee-lsit-component', require('./components/employee/ListComponent.vue').default);
Vue.component('position-list-component', require('./components/position/ListComponent.vue').default);

const app = new Vue({
    el: '#app',
});
