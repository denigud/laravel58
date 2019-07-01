<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                            <input name="title" v-model="item.title"
                                                   id="title"
                                                   type="text"
                                                   class="form-control"
                                                   minlength="3"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Цена</label>
                                            <input name="price" v-model="item.price"
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
                                                      v-model="item.description">
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
                                            <input name="slug" v-model="item.slug"
                                                   id="slug"
                                                   type="text"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Категория</label>
                                            <select name="category_id" v-model="item.category_id"
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
                                                   value="0" v-model="item.is_active">

                                            <input name="is_active"
                                                   type="checkbox"
                                                   class="form-check-input"
                                                   value="1"
                                                   v-model="item.is_active">
                                            <label class="form-check-label" for="is_active">Активный</label>
                                        </div>
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "item_edit_main",
        props:['item', 'categoryList'],
    }
</script>
