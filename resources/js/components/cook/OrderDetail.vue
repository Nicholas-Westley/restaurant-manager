<template>
    <div v-if="selectedOrder">
        <h4> Order Number {{ selectedOrder.id }}</h4>
        <order-operations
            :selectedOrder="selectedOrder"
            @acceptOrder="$emit('acceptOrder', selectedOrder)"
            @deleteOrder="$emit('deleteOrder', selectedOrder)"
            style="margin-bottom: 16px;"
        />

        <order-detail-order-item
            v-for="item in selectedOrder.order_items"
            :key="item.id"
            :item="item"
            :selectedOrder="selectedOrder"
            @markItemInProgress="$emit('markItemInProgress', item)"
            @markItemCompleted="$emit('markItemCompleted', item)"/>
    </div>
</template>

<script>
    import OrderOperations from './OrderOperations';
    import OrderDetailOrderItem from './OrderDetailOrderItem';
    export default {
        name: "order-detail",
        props: ['selectedOrder'],
        components: {
            OrderOperations,
            OrderDetailOrderItem
        }
    }
</script>
