<template>
    <div class="cook-pane">
        <div class="cook-column order-list">
            <order-list @orderSelected="orderSelected"/>
        </div>
        <div class="cook-column order-detail">
            <order-detail
                :selectedOrder="selectedOrder"
                @acceptOrder="acceptOrder"
            />
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
                    .then(response => this.selectedOrder = response.data);
            },
            acceptOrder(order) {
                if(this.selectedOrder && !this.selectedOrder.id) return;
                this.selectedOrder.accepted = true;
                axios.post(`orders/${order.id}`, { data: order , _method: 'patch'})
                    .then(response => console.log(response.data))
                    .catch(error => console.error(error));
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
