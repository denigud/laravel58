<template>

    <div id="category_edit">
<!--        <div class="loading" v-if="loading">-->
<!--            Загрузка...-->
<!--        </div>-->
        <form @submit.prevent="submitHandler">
            <div v-if="category" class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <item_edit_main_col :category="category" :categoryList="categoryList"></item_edit_main_col>
                    </div>
                    <div class="col-md-3">
                        <item_edit_add_col :category="category"></item_edit_add_col>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import item_edit_main_col from './categories/includes/item_edit_main_col'
    import item_edit_add_col from './categories/includes/item_edit_add_col'
    export default {
        name: 'category_edit',
        components:{
            item_edit_add_col,
            item_edit_main_col
        },
        data() {
            return {
                category: null,
                categoryList: null,
                loading: false,
                id: null,
            }
        },
        created () {
            this.fetchData()
        },
        watch: {
            // при изменениях маршрута запрашиваем данные снова
            '$route': 'fetchData'
        },
        methods: {
            fetchData() {
                this.loading = true;
                // axios.get('/category/api?categoryId=' + this.id)
                if(this.$route.params.id !== undefined) {
                    this.id = this.$route.params.id;
                }else{
                    this.id = '';
                };

                console.log(this.id);
                if (this.id != "") {
                    axios.get('/category/api?categoryId=' + this.id)
                        .then((response) => {
                            this.category = response.data.category;
                            this.categoryList = response.data.categoryList;
                            this.loading = false;
                        })
                        .catch(() => {
                            console.log('handle server error from here');
                        });
                }
            },
            submitHandler(){
                axios.post('/category/update/api', this.category)
                    .then((response) => {
                        alert(response.data['msg']);
                        this.$router.go(-1);
                    })
                    .catch((e) => {
                        alert(e, response.data['msg']);
                    });

            }
        }
    }
</script>
