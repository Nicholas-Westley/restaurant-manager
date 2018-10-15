<template>
    <div class="cook-pane">
        <div class="cook-column order-list">
            <order-list
                :orders="orders"
                :selectedOrder="selectedOrder"
                @orderSelected="orderSelected"
                @acceptOrder="acceptOrder"
                @deleteOrder="deleteOrder"
                @serveOrder="serveOrder"/>
        </div>
        <div class="cook-column order-detail">
            <order-detail
                :selectedOrder="selectedOrder"
                @acceptOrder="acceptOrder"
                @deleteOrder="deleteOrder"
                @serveOrder="serveOrder"
                @markItemInProgress="markItemInProgress"
                @markItemCompleted="markItemCompleted"
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
                orders: [],
                selectedOrder: null
            }
        },
        mounted() {
            axios.get('orders')
                .then( response => {
                    this.orders = response.data;
                    this.orderSelected(this.orders[0]);
                } );
        },
        methods: {
            setOrders(orders) {
                this.orders = orders;
                if (this.selectedOrder && this.selectedOrder.id) {
                    this.orders.forEach(o => {
                        if (o.id === this.selectedOrder.id) this.selectedOrder = o;
                    });
                }
            },
            orderSelected(order) {
                if(this.selectedOrder && this.selectedOrder.id === order.id) return this.selectedOrder = null;
                this.selectedOrder = order;
                axios.get(`orders/${order.id}`)
                    .then(response => this.selectedOrder = response.data);
            },
            acceptOrder(order) {
                if(!order || !order.id) return;
                order.accepted = true;
                this.updateOrder(order);
                if(this.selectedOrder.id !== order.id) {
                    this.orderSelected(order);
                }
            },
            serveOrder(order) {
                if(!order || !order.id) return;
                order.served = true;
                this.updateOrder(order);
            },
            updateOrder(order) {
                axios.post(`orders/${order.id}`, { data: order , _method: 'patch'})
                    .then(response => this.setOrders(response.data))
                    .catch(error => console.error(error));
            },
            deleteOrder(order) {
                if(!order || !order.id) return;
                if(order.id === this.selectedOrder.id) this.selectedOrder = null;
                axios.delete(`orders/${order.id}`)
                    .then(response => this.setOrders(response.data ))
                    .catch(error => console.error(error));
            },
            markItemInProgress(item) {
                if(!item || !item.id) return;
                item.in_progress = true;
                this.updateItem(item);
            },
            markItemCompleted(item) {
                if(!item || !item.id) return;
                item.completed = true;
                item.in_progress = false;
                this.updateItem(item);
            },
            updateItem(item) {
                axios.post(`order-items/${item.id}`, { data: item , _method: 'patch'})
                    .then(response => {
                        if(response.data.ready) {
                            const order = this.orders.find(o => o.id === item.order_id);
                            order.ready = true;
                        }
                    })
                    .catch(error => console.error(error));
            }
        }
    }
</script>

<style scoped>
    .cook-pane {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .cook-column {
    }
    .order-list{
        flex: 0.4;
    }
    .order-detail {
        flex: 0.6;
        padding: 16px;
    }
</style>
