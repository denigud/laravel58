<template>
    <div id="shop-categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                        <a href="#" class="btn btn-primary">Добавить</a>
    <!--                    {{ route('shop.admin.categories.create') }}-->
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
                                    <tr v-for="category in categories" :key="category.slug">
                                        <td>{{ category.id }}</td>
                                        <td>
                                            <router-link :to="'/categories/edit/' + category.id">
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
    </div>
</template>

<script>
    export default {
        name: 'shop-categories',
        props: ['current_page'],
        data(){
            return{
                categories: this.categories
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
            }
        }
    }
</script>
