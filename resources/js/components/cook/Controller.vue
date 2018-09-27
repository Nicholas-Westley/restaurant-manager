<template>
    <div class="cook-pane">
        <div class="cook-column order-list">
            <order-list @orderSelected="orderSelected"/>
        </div>
        <div class="cook-column order-detail">
            <order-detail :selectedOrder="selectedOrder"/>
        </div>
    </div>
</template>

<script>
    import OrderList from './OrderList';
    import OrderDetail from './OrderDetail';
    export default {
        name: "cook-controller",
        components: { OrderList, OrderDetail },
        data() {
            return {
                selectedOrder: null
            }
        },
        methods: {
            orderSelected(order) {
                if(this.selectedOrder && this.selectedOrder.id === order.id) return this.selectedOrder = null;
                axios.get(`orders/${order.id}`)
                    .then(response => {
                        this.selectedOrder = response.data
                        console.log(this.selectedOrder);
                    });
            }
        }
    }
</script>

<style scoped>
    .cook-pane {
        background-color: #FAFAFF;
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .cook-column {
        padding: 16px;
    }
    .order-list{
        flex: 0.4;
    }
    .order-detail {
        flex: 0.6;
    }

</style>
