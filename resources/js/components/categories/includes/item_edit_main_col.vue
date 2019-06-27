<template>
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
                                <input name="title" v-model="category.title"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                                <input name="slug" v-model="category.slug"
                                       id="slug"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Родитель</label>
                                <select name="parent_id" v-model="category.parent_id"
                                        id="parent_id"
                                        class="form-control"
                                        required>
                                    <option disabled value=null>Выберете катигорию</option>
                                    <option v-for="categoryOption in categoryList" v-bind:value="categoryOption.id">
                                        {{ categoryOption.id_title }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description"
                                          id="description"
                                          rows="3"
                                          class="form-control"
                                          v-model="category.description">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "item_edit_main",
        props:['category', 'categoryList'],
    }
</script>

<style scoped>

</style>
