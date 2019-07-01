<template>
    <div id="category-create">
        <form method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <item_create_main_col></item_create_main_col>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import item_create_main_col from './includes/item_create_main_col'
    export default {
        name: 'category-create',
        components:{
            item_create_main_col,
        },
        data() {
            return {
            }
        },
        methods: {

        }
    }
</script>
