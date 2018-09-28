<template>
    <div v-if="selectedOrder">
        <h4> Order Number {{ selectedOrder.id }}</h4>
        <order-operations
            :selectedOrder="selectedOrder"
            @acceptOrder="$emit('acceptOrder', selectedOrder)"
            @deleteOrder="$emit('deleteOrder', selectedOrder)"
        />

    </div>
</template>

<script>
    import OrderOperations from './OrderOperations';
    export default {
        name: "order-detail",
        props: ['selectedOrder'],
        components: { OrderOperations }
    }
</script>

<style scoped>

</style>
