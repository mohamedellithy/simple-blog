window.Vue = require('vue');

import VueRouter from 'vue-router';
import Home from './pages/front/Home';
import SingelPost from './pages/front/Single-post';
import CategoryPage from './pages/front/Category-page';
// import PostsCreate from './pages/admin/Posts/create';
// import Categories from './pages/admin/Categories/index';
// import CategoryCreate from './pages/admin/Categories/create';

Vue.use(VueRouter);


const routes = [{
        name: 'Home',
        path: '/home',
        component: Home,
    },
    {
        name: 'SingelPost',
        path: '/single-post/:id',
        component: SingelPost,
    },
    {
        name: 'CategoryPage',
        path: '/categories-page/:id',
        component: CategoryPage,
    }
];

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes,
    scrollBehavior(to, from, savedPosition) {
        return { x: 10, y: 10 };
    }
});

export default router;