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
Vue.component('categories-component', require('./components/categories/ShopCategoriesComponent.vue').default);
Vue.component('category-create', require('./components/categories/includes/item_create_main_col').default);

Vue.component('items-component', require('./components/items/ShopItemsComponent.vue').default);
Vue.component('item-create', require('./components/items/includes/item_create').default);
Vue.component('item-edit-component', require('./components/items/ShopItemComponent').default);

const categoryComponent = Vue.component('category-edit-component', require('./components/categories/ShopCategoryComponent').default);

const categoryCreateComponent = Vue.component('category-create-component', require('./components/categories/ShopCategoryCreateComponent').default);



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
        },
        {
            name: 'categoryCreate',
            path: '/admin/shop/categories/create',
            component: categoryCreateComponent,
        },
    ],
});


const app = new Vue({
    el: '#app',
    router: router,
});

