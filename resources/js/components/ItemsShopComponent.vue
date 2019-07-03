<template>
    <div id="shop-items">
        <transition mode="out-in">
        <router-view></router-view>
            <div class="container">

                <custom_input v-model="searchText"></custom_input>
                <p>{{ description }}</p>

                <p>
                    {{ count }}
                    <button @click="decrement">-</button>
                    <button @click="increment">+</button>
                </p>

                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" v-on:click="currentView = 'grid'">Плитка <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" v-on:click="currentView = 'list'">Список</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <br>

                <component :is="currentViewComponent" :items="items"></component>

                <component :is="'item_show_description'"></component>

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

    export default {
        name: 'shop-items',
        props: ['last_page'],
        components:{
            item_view_list,
            item_view_grid,
            item_show_description,
            custom_input,
        },
        data(){
            return{
                items: null,
                dialog_show: false,
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
            count () {
                return this.$store.state.count
            },
        },
        watch:{
            searchText: 'changeSearchText',
        },
        methods: {
            getItems(pageNum = 1) {
                axios.get('/items/shop/api?page='+ pageNum)
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
                this.dialog_show = true;
                this.loading = true;
            },
            changeSearchText(){
              this.description = this.searchText;
            },
            increment () {
                this.$store.commit('increment')
            },
            decrement () {
                this.$store.commit('decrement')
            },
        }
    }
</script>
