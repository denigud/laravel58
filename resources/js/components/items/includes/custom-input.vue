<template>
    <div>
        <input class="form-control"
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
        >
    </div>
</template>

<script>
    export default {
        name: "custom-input",
        props: ['value'],
    }
</script>

<style scoped>

</style>
