
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        msg: 'Update new Posts',
        content: '',
        posts: []
    },
    ready: function(){
        this.created();

    },

    created(){
        axios.post('http://localhost:8000/posts')
            .then(response => {
                console.log(response);
            this.posts = response.data;
        }).catch(function (error) {
            console.log(error); //error
        });
    },


    methods: {
        addPost(){

            axios.post('http://localhost:8000/addPost',{
                content: this.content
            }).then(function (response) {
                console.log('Saved successfully'); //Muestra si es correcto

            }).catch(function (error) {
                console.log(error); //error
            });
        }
    }
});
