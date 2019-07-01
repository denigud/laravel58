<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <v-dialog :value="value" @input="$emit('input')">
                <form @submit.prevent="submitHandler">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"></div>
                            <div class="card-subtitle mb-2 text-muted"></div>
                                <v-tabs>
                                    <v-tab>Основные данные</v-tab>
                                    <v-tab>Доп. данные</v-tab>
                                    <v-tab-item>
                                        <v-card flat>
                                            <v-card-text>
                                                <div class="tab-content">
                                                    <div class="form-group">
                                                        <label for="title">Заголовок</label>
                                                        <input name="title" v-model="title"
                                                               id="title"
                                                               type="text"
                                                               class="form-control"
                                                               minlength="3"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price">Цена</label>
                                                        <input name="price" v-model="price"
                                                               id="price"
                                                               type="number"
                                                               class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Описание товара</label>
                                                        <textarea name="description"
                                                                  id="description"
                                                                  rows="3"
                                                                  class="form-control"
                                                                  v-model="description">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>
                                    <v-tab-item>
                                        <v-card flat>
                                            <v-card-text>
                                                <div class="tab-content">
                                                    <div class="form-group">
                                                        <label for="slug">Идентификатор</label>
                                                        <input name="slug" v-model="slug"
                                                               id="slug"
                                                               type="text"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category_id">Категория</label>
                                                        <select name="category_id" v-model="category_id"
                                                                id="category_id"
                                                                class="form-control"
                                                                required>
                                                            <option disabled value=null>Выберете катигорию</option>
                                                            <option v-for="$categoryOption in categoryList" v-bind:value="$categoryOption.id">
                                                                {{ $categoryOption.id_title }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="is_active"
                                                               type="hidden"
                                                               value="0">

                                                        <input name="is_active"
                                                               type="checkbox"
                                                               class="form-check-input"
                                                               value="1">
                                                        <label class="form-check-label" for="is_active">Активный</label>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>
                                </v-tabs>
                            <br>
                            <div class="tab-content">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </v-dialog>
        </div>
    </div>
</template>

<script>
    export default {
        name: "item_create",
        props: ['value'],
        data(){
            return{
                title: null,
                slug: null,
                category_id: null,
                description: null,
                loading: false,
                categoryList: null,
                is_active: false,
                price: null,
            }
        },
        beforeUpdate(){
            this.loading = this.$attrs.loading;
            this.fetchData();
            this.$attrs.loading = false;
        },
        methods:{
            fetchData() {

                if(this.loading) {
                    this.title = null;
                    this.slug = null;
                    this.category_id = null;
                    this.description = null;
                    this.is_active = false;
                    this.price = null;

                    axios.get('/categories/all/api')
                        .then((response) => {
                            this.categoryList = response.data;
                        })
                        .catch(() => {
                            console.log('handle server error from here');
                        });
                    this.loading = false;
                }
            },
            submitHandler(){
                axios.post('/item/store/api', {
                        title:       this.title,
                        slug:        this.slug,
                        category_id: this.category_id,
                        description: this.description,
                        price:       this.price,
                    })
                    .then((response) => {
                        alert(response.data['success']);
                        this.$emit('input');
                    })
                    .catch((e) => {
                        alert(e, response.data['msg']);
                    });

            }
        }
    }
</script>
