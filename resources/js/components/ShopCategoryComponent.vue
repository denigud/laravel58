<template>
    <div id="category-edit">
        <form method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title"></div>
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#maindata"
                                                   role="tab">Основные данные</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="maindata" role="tabpanel">
                                                <div class="form-group">
                                                    <label for="title">Заголовок</label>
                                                    <div v-if="!loading">
                                                    <input name="title" v-model="category.title"
                                                           id="title"
                                                           type="text"
                                                           class="form-control"
                                                           minlength="3"
                                                           required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="slug">Идентификатор</label>
                                                    <div v-if="!loading">
                                                    <input name="slug" v-model="category.slug"
                                                           id="slug"
                                                           type="text"
                                                           class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Описание</label>
                                                    <div v-if="!loading">
                                                    <textarea name="description"
                                                              id="description"
                                                              rows="3"
                                                              class="form-control">
                                                        {{ category.description }}
                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <div v-if="!loading">
                                            <li>ID: {{ category.id }}</li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Создано</label>
                                            <div v-if="!loading">
                                            <input type="text" v-model="category.created_at" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Изменено</label>
                                            <div v-if="!loading">
                                            <input type="text" v-model="category.updated_at" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Удалено</label>
                                            <div v-if="!loading">
                                            <input type="text" v-model="category.deleted_ad" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'category-edit',
        data() {
            return {
                category: this.category,
                categoryList: this.categoryList,
                loading: false,
            }
        },
        beforeMount() {
            this.getCategory();
        },

        methods: {
            getCategory() {
                this.loading = true;
                axios.get('/category/api?categoryId=' + this.$route.params.id)
                    .then((response) => {
                        this.category = response.data.category;
                        this.categoryList = response.data.categoryList;
                        this.loading = false;
                    })
                    .catch(() => {
                        console.log('handle server error from here');
                    });
            },
        }
    }
</script>
