<template>
   <div class="order-list">
       <div v-for="order in orders">
           <order :order="order"/>
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
            console.log("mounted");
            axios.get('orders')
                .then(response => console.log(response) || (this.orders = response.data));
        }
    }

</script>

<style scoped>
    .order-list {
        background-color: white;
        flex: 0.25;
    }
</style>
