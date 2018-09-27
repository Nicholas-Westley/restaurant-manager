<template>
    <div class="button-container">
        <button
            :disabled="!submittable"
            @click="$emit('submitOrder')"
            class="btn btn-success float-left;">
            Submit Order
        </button>
        <div
            class="disabled-explanation"
            v-if="!submittable">
            Add or cancel current item to enable submit order
        </div>
    </div>
</template>

<script>
    export default {
        name: "submit-order",
        props: ['submittable']
    }
</script>

<style scoped>
    .button-container {
        display: flex;
    }
    .disabled-explanation {
        padding-left: 8px;
        font-size: 75%;
    }
</style>
