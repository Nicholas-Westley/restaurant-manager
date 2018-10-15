<template>
   <div class="order-list">
       <div v-for="order in orders">
           <order-list-item
               :order="order"
               :selectedOrder="selectedOrder"
               @orderSelected="$emit('orderSelected', order)"
               @acceptOrder="$emit('acceptOrder', order)"
               @deleteOrder="$emit('deleteOrder', order)"
               @serveOrder="$emit('serveOrder', order)"/>
       </div>
   </div>
</template>

<script>
    import OrderListItem from './OrderListItem';
    export default {
        props: ['orders', 'selectedOrder'],
        components: { OrderListItem },
        computed: {
            items() {
                return _.orderBy(this.selectedOrder.order_items,
                    ['in_progress', 'completed'], ['desc', 'asc']);
            }
        }
    }

</script>

<style scoped>
    .order-list {
        flex: 0.4;
        overflow-y: auto;
        height: calc(100vh - 36px);
    }
</style>
