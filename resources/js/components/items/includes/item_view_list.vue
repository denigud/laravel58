<template>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
                <td>{{ item.id }}</td>
                <td v-if="item.category.id !== 0">{{ item.category.title }}</td>
                <td>
                    <a href="#" id="dialog_edit" @click="emitMethod(item.description)">{{ item.title }}</a>
                </td>
                <td>{{ item.price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import EventBus from '../../../event-bus';
    export default {
        name: "item_view_row",
        props: ['items'],
        methods:{
            emitMethod (description){
                EventBus.$emit('showDescription', description);
            },
        }
    }
</script>

<style scoped>

</style>
