<template>
   <div class="order-list">
       <div v-for="order in orders">
           <order
               :order="order"
               @orderSelected="$emit('orderSelected', order)" />
       </div>
   </div>
</template>

<script>
    import Order from './Order';
    export default {
        components: {Order},
        data() {
            return {
                orders: []
            }
        },
        mounted() {
            axios.get('orders')
                .then(response => {
                    this.orders = response.data;
                    console.log(this.orders);
                });
        }
    }

</script>

<style scoped>
    .order-list {
        background-color: white;
        flex: 0.4;
        overflow-y: auto;
    }
</style>
