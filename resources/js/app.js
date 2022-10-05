require('./bootstrap');

import Vue 			                from 'vue'

import ListUserComponent            from "./components/admin/user/ListUserComponent";

window.Vue = Vue

let app = new window.Vue({
    el: '#app',
    components: {
        ListUser: ListUserComponent
    },
})
