<template>
    <div>
        <span v-if="!submittable">
            Add or cancel current item to enable submit order
        </span>
        <button
            :disabled="!submittable"
            class="btn btn-success float-right;">
            Submit Order
        </button>
    </div>
</template>

<script>
    export default {
        name: "submit-order",
        props: ['submittable']
    }
</script>

<style scoped>

</style>
