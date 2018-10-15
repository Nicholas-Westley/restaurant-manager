<template>
    <div v-if="selectedOrder">


        <h1>
            Order Number {{ selectedOrder.id }}

            <order-operations
                :order="selectedOrder"
                @acceptOrder="$emit('acceptOrder', selectedOrder)"
                @deleteOrder="$emit('deleteOrder', selectedOrder)"
                @serveOrder="$emit('serveOrder', selectedOrder)"
                class="float-right"
            />
        </h1>




        <order-detail-order-item
            v-if="selectedOrder.accepted"
            v-for="item in items"
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
        },
        computed: {
            items() {
                return _.orderBy(this.selectedOrder.order_items,
                    ['in_progress', 'completed'], ['desc', 'asc']);
            }
        }
    }
</script>
