<template>
    <div id="shop-categories">
        <transition mode="out-in">
        <router-view></router-view>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <v-app>
                            <item-create v-model="dialog" v-bind:loading="true"/>
                            <item-edit-component v-model="dialog_edit" v-bind:id="itemId" v-bind:loading="true"/>
                            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                                <v-btn @click="dialog = true" depressed color="primary" >Добавить товар</v-btn>
                            </nav>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Категория</th>
                                            <th>Заголовок</th>
                                            <th>Цена</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in items" :key="item.id">
                                                <td>{{ item.id }}</td>
                                                <td v-if="item.category.id !== 0">{{ item.category.title }}</td>
                                                <td>
                                                    <a href="#" id="dialog_edit" @click="open(item.id)">{{ item.title }}</a>
                                                </td>
                                                <td>{{ item.price }}</td>
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
        name: 'shop-items',
        props: ['last_page'],
        data(){
            return{
                items: null,
                dialog: false,
                dialog_edit: false,
                itemId: null,
                loading: false,
                page: 1,
            }
        },
        beforeMount() {
            this.getItems(1);
        },
        methods: {
            getItems(pageNum = 1) {
                axios.get('/items/api?page='+ pageNum)
                    .then((response) => {
                        this.items = response.data.data;
                    })
                    .catch(() => {
                        console.log('handle server error from here');
                    });
            },
            onPageChange(page){
                this.getItems(page);
            },
            open(id){
                this.itemId = id;
                this.dialog_edit = true;
                this.loading = true;
            }

        }
    }
</script>
