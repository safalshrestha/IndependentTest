/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function() {

    $(document).on("click", '.load-register', function(e) {
        e.preventDefault();

        window.location = "/register";
    });


    $(document).on("click", '.load-login', function(e) {
        e.preventDefault();

        window.location = "/login";
    });


    //load app start page
    $(document).on("click", '#load-mainpage', function(e) {
        e.preventDefault();

        $.get('/home', function(data) {
            $('#pagecontent').html(data);
        });
    });

    //ajax load genre
    $(document).on("click", '#load-genre', function(e) {
        e.preventDefault();

        $.get('/genre', function(data) {
            $('#pagecontent').html(data);
        });
    });


    //ajax load movie list based on genre
    $(document).on("click", ".load-movie-list", function(e){
        e.preventDefault();
        $.get('/movies/'+ $(this).data('genre'), function(data) {
            $('#pagecontent').html(data);
        });
    });

    //ajax load movie detail
    $(document).on("click", ".load-movie-detail", function(e){
        e.preventDefault();
        $.get('/moviedetail/'+ $(this).data('movieid'), function(data) {
            $('#pagecontent').html(data);
        });
    });

    //ajax change pages
    $(document).on("click", ".load-movie-page", function(e){
        e.preventDefault();
        $.get('/movies/?pageno='+$(this).data('moviepage'), function(data) {
            $('#pagecontent').html(data);
        });
    });

    //search for movies
    $(document).on("click", "#load-search", function(e){
        e.preventDefault();
        var query = document.getElementById("searchterm");
        $.get('/searchmovies/', function(data) {
            $('#pagecontent').html(data);
        });
    });

        //search for movies by name
    $(document).on("click", "#searchmovie", function(e){
        e.preventDefault();
        var query = $('#searchterm').val();
        $.get('/searchmovies/?query='+query, function(data) {
            $('#pagecontent').html(data);
        });
    });
});


