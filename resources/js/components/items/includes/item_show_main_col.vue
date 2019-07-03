<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div v-if="item.is_active">Активный</div>
                    <div v-else>Не активный</div>
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title" v-model="item.title"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание товара</label>
                                <textarea name="description"
                                          id="description"
                                          rows="20"
                                          class="form-control" v-model="item.description" disabled>
                            </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select name="category_id"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Выберете катигорию"
                                        disabled>
                                        <option disabled value=null>Без категории</option>
                                        <option v-for="$categoryOption in categoryList" v-bind:value="$categoryOption.id">
                                            {{ $categoryOption.id_title }}
                                        </option>
                                </select>
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
        name: "item_show_main",
        props:['item', 'categoryList'],
    }
</script>
