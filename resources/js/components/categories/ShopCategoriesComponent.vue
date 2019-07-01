<template>
    <div id="shop-categories">
        <transition mode="out-in">
        <router-view></router-view>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <v-app>
                            <category-create v-model="dialog" v-bind:loading="true"/>
                            <category-edit-component v-model="dialog_edit" v-bind:id="categoryId" v-bind:loading="loading"/>

                        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                            <v-btn @click="dialog = true" depressed color="primary" >Добавить</v-btn>
<!--                            <router-link :to="{ name: 'categoryCreate'}" class="btn btn-primary">-->
<!--                                Добавить-->
<!--                            </router-link>-->
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
                                                <a href="#" id="dialog_edit" @click="open(category.id)">{{ category.title }}</a>
<!--                                                <router-link @click.prevent="dialog_edit = true" :to="{ name: 'categoryEdit', params: { id: category.id }}">-->
<!--                                                    {{ category.title }}-->
<!--                                                </router-link>-->
                                            </td>
                                            <td v-if="category.parent_id !== 0">{{ category.parent_category.title }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </v-app>
                    </div>
                </div>
                <div class="text-xs-center">
                <v-pagination
                    v-model="page"
                    :length="parseInt(last_page)"
                    :total-visible="7"
                    @input="onPageChange"
                ></v-pagination>
                </div>
            </div>

        </transition>
    </div>
</template>

<script>
    export default {
        name: 'shop-categories',
        props: ['last_page'],
        data(){
            return{
                categories: this.categories,
                category: null,
                dialog: false,
                dialog_edit: false,
                categoryId: null,
                loading: false,
                page: 1,
            }
        },
        beforeMount() {
            this.getCategories(1);
        },
        methods: {
            getCategories(pageNum = 1) {
                axios.get('/categories/api?page='+ pageNum)
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(() => {
                        console.log('handle server error from here');
                    });
            },
            onPageChange(page){
                this.getCategories(page);
            },
            open(id){
                this.categoryId = id;
                this.dialog_edit = true;
                this.loading = true;
            }

        }
    }
</script>
