<template>
   <div class="order-list">
       <div v-for="order in orders">
           <order-list-item
               :order="order"
               @orderSelected="$emit('orderSelected', order)" />
       </div>
   </div>
</template>

<script>
    import OrderListItem from './OrderListItem';
    export default {
        props: ['orders'],
        components: { OrderListItem }
    }

</script>

<style scoped>
    .order-list {
        background-color: white;
        flex: 0.4;
        overflow-y: auto;
    }
</style>
