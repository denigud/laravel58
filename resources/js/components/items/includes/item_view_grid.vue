<template>
    <div class="card-deck">

        <div v-for="item in items" :key="item.id">
            <div class="card" style="width: 18rem;">
                <img src="#" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">
        <!--                <router-link @click.prevent="dialog_show = true" :to="{ name: 'itemShow', params: { id: item.id }}">-->
                            {{ item.title }}
        <!--                </router-link>-->
                    </h5>
                    <p class="card-text">
                        {{ item.description }}
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Цена: {{ item.price }}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "item_view_row",
        props: ['items'],
    }
</script>

<style scoped>

</style>
