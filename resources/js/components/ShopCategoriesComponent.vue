<template>

    <div id="shop-categories">

        <transition mode="out-in">
        <router-view></router-view>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                            <router-link :to="{ name: 'categoryCreate'}" class="btn btn-primary">
                                Добавить
                            </router-link>
                        </nav>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Категория</th>
                                        <th>Родитель</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="category in categories" :key="category.id">
                                            <td>{{ category.id }}</td>
                                            <td>
                                                <router-link :to="{ name: 'categoryEdit', params: { id: category.id }}">
                                                    {{ category.title }}
                                                </router-link>
                                            </td>
                                            <td v-if="category.parent_id !== 0">{{ category.parent_category.title }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    //import category_edit from './ShopCategoryComponent'
    export default {
        name: 'shop-categories',
        props: ['current_page'],
        components:{
            //category_edit,
        },
        data(){
            return{
                categories: this.categories,
                category: null,
                modalOpened: false,
            }
        },
        beforeMount() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                axios.get('/categories/api?page='+this.current_page)
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(() => {
                        console.log('handle server error from here');
                    });
            },
            openModal () {
                this.modalOpened = true;
            },
        }
    }
</script>
