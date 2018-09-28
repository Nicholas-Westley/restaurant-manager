<template>
    <div v-if="selectedOrder">
        <button
            v-if="!selectedOrder.accepted"
            class="btn btn-danger"
            @click="$emit('acceptOrder', selectedOrder)">
            Accept</button>
        <!--{{ selectedOrder }}-->

    </div>
</template>

<script>
    export default {
        name: "order-detail",
        props: ['selectedOrder']
    }
</script>

<style scoped>

</style>
