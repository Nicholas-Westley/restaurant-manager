<template>
    <div>
        <button
            v-if="!selectedOrder.accepted"
            class="btn btn-danger"
            @click="$emit('acceptOrder')">
            Accept</button>
        <button
            v-if="!selectedOrder.served && selectedOrder.ready"
            class="btn btn-primary"
            @click="$emit('serveOrder')">
            Serve</button>
        <button
            class="btn btn-danger"
            @click="$emit('deleteOrder')">
            Delete Order</button>
    </div>
</template>

<script>
    export default {
        name: "order-operations",
        props: ['selectedOrder']
    }
</script>

