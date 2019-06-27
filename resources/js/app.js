/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-router'));
Vue.use(require('vuetify'));

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
Vue.component('categories-component', require('./components/ShopCategoriesComponent.vue').default);
Vue.component('category-create', require('./components/categories/includes/item_create_main_col').default);


const categoryComponent = Vue.component('category-edit-component', require('./components/ShopCategoryComponent').default);
// const categoryMainCol = Vue.component(require('./components/categories/includes/item_edit_main_col').default);
// const categoryAddCol = Vue.component('categoryAddCol', require('./components/categories/includes/item_edit_add_col').default);

const categoryCreateComponent = Vue.component('category-create-component', require('./components/ShopCategoryCreateComponent').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            name: 'categoryEdit',
            path: '/admin/shop/categories/:id/edit',
            components: {
                default: categoryComponent,

            }
            //component: categoryComponent,
        },
        {
            name: 'categoryCreate',
            path: '/admin/shop/categories/create',
            component: categoryCreateComponent,
        },
        // { path: '*', component: NotFoundComponent },
    ],
});


const app = new Vue({
    el: '#app',
    router: router,
});

