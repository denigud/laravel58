<template>
    <div id="shop-items">
        <transition mode="out-in">
        <router-view></router-view>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <custom_input v-model="searchText"></custom_input>
                        <p>{{ description }}</p>

                        <v-app>
                            <ShoppingCart v-model="dialog"/>
                            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                                <nav class="nav nav-pills nav-fill">
                                    <a class="nav-link" href="#" v-on:click="currentView = 'grid'">Плитка <span class="sr-only">(current)</span></a>
                                    <a class="nav-link" href="#" v-on:click="currentView = 'list'">Список</a>
                                    <a class="nav-link" href="#" id="dialog_edit" @click="dialog= true">Товаров в корзине: {{ cartTotalQuantity }}</a>
                                </nav>
                            </nav>
                            <br>

                            <component :is="currentViewComponent" :items="items"></component>

                            <component :is="'item_show_description'"></component>
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
    import item_view_list from './items/includes/item_view_list';
    import item_view_grid from './items/includes/item_view_grid.vue';
    import item_show_description from './items/includes/item_show_description.vue';
    import custom_input from './items/includes/custom-input.vue';
    import ShoppingCart from './ShoppingCart.vue';

    import { mapGetters } from 'vuex';

    export default {
        name: 'shop-items',
        props: ['last_page'],
        components:{
            item_view_list,
            item_view_grid,
            item_show_description,
            custom_input,
            ShoppingCart,
        },
        data(){
            return{
                items: null,
                dialog_show: false,
                dialog: false,
                itemId: null,
                loading: false,
                page: 1,
                currentView: 'list',
                searchText:'',
                description: '',
            }
        },
        beforeMount() {
            this.getItems(1);
        },
        computed: {
            currentViewComponent() {
                return 'item_view_' + this.currentView;
            },

            ...mapGetters('cart', [
                'cartTotalQuantity'
            ]),
        },
        watch:{
            searchText: 'changeSearchText',
        },
        methods: {
            getItems(pageNum = 1) {
                axios.get('/items/shop/api?page='+ pageNum)
                    .then((response) => {
                        this.items = response.data.data;
                        this.$store.commit('products/setProducts',this.items)
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
                this.dialog_show = true;
                this.loading = true;
            },
            changeSearchText(){
              this.description = this.searchText;
            },
        }
    }
</script>
