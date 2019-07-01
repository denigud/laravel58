<template>
    <div>
<!--    <div id="category_edit">-->
<!--        <div class="loading" v-if="loading">-->
<!--            Загрузка...-->
<!--        </div>-->
        <v-dialog :value="value" @input="$emit('input')">
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
        </v-dialog>
    </div>
</template>

<script>
    import item_edit_main_col from './includes/item_edit_main_col'
    import item_edit_add_col from './includes/item_edit_add_col'
    export default {
        name: 'category_edit',
        props: ['value'],
        components:{
            item_edit_add_col,
            item_edit_main_col
        },
        data() {
            return {
                category: null,
                categoryList: null,
                loading: true,
                id: null,
            }
        },
        created () {
            // this.fetchData()
        },
        beforeUpdate(){
            this.loading = this.$attrs.loading;
            this.fetchData();
            this.$attrs.loading = false;
        },
        watch: {
            // при изменениях маршрута запрашиваем данные снова
            '$route': 'fetchData'
        },
        methods: {
            fetchData() {
                if(this.$route.params.id !== undefined) {
                    this.id = this.$route.params.id;
                }else if(this.$attrs.id !== undefined){
                    this.id = this.$attrs.id;
                }else{
                    this.id = '';
                };

                if (this.id != "" && this.loading) {
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
                this.loading = false;

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
