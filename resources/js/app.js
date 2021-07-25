/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import router from './route.js';

require('./filter.js');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('checkbox-categories', require('./components/Categories.vue').default);
Vue.component('posts-datatable', require('./components/PostsDatatable.vue').default);
Vue.component('categories-datatable', require('./components/CategoriesDatatable.vue').default);
Vue.component('banner-posts', require('./components/front/BannerPosts.vue').default);
Vue.component('blog-posts', require('./components/front/BlogPosts.vue').default);
Vue.component('recent-posts', require('./components/front/RecentPosts.vue').default);
Vue.component('categories-list', require('./components/front/CategoriesList.vue').default);
Vue.component('comments-post', require('./components/front/CommentsPost.vue').default);
Vue.component('loading', require('./components/front/Loading.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: { loading: false },
    router,
});

router.beforeEach((to, from, next) => {
    app.loading = true
    next()
});

router.afterEach((to, from, next) => {
    setTimeout(() => app.loading = false, 1500) // timeout out
    next()
})