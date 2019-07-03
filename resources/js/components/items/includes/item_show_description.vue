<template>
    <div>
        <div class="form-group">
            <label for="description">Описание товара</label>
            <textarea name="description"
                      id="description"
                      rows="20"
                      class="form-control" v-model="description" disabled>
            </textarea>
        </div>
    </div>
</template>

<script>
    import EventBus from '../../../event-bus';
    export default {
        name: "item_show_description",
        data(){
            return{
                description: null,
            }
        },
        mounted () {
            EventBus.$on('showDescription', (itemDescription)=>{
                this.description = itemDescription;
            });
        },
    }
</script>

<style scoped>

</style>
