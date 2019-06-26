<template>
    <div>
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
                            <li>ID: {{ category.id }}</li>
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
                            <label for="created_at">Создано</label>
                            <input name="created_at" type="text" v-model="category.created_at" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Изменено</label>
                            <input name="updated_at" type="text" v-model="category.updated_at" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="deleted_ad">Удалено</label>
                            <input name="deleted_ad" type="text" v-model="category.deleted_ad" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "item_edit_add_col",
        props:['category'],
    }
</script>

<style scoped>

</style>
