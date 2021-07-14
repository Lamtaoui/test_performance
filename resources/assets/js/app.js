require('./bootstrap');
import Vue from 'vue' ;
window.Vue = require('vue');


Vue.component('home',require('./components/Home.vue'))
Vue.component('example', require('./components/Example.vue'));
Vue.component('jurry',require('./components/Jurry.vue'))

const app = new Vue({
    el: '#app'
});

const tab = new Vue({
    el: '#jurries',
    data: {jurries:[]},
    created: function() {
        var vm = this;
        fetch("api/jurries")
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                vm.users = data;
            });
    }
})
