<template>
    <div>
        <v-btn
            v-if="!selectedOrder.accepted"
            color="success"
            @click="$emit('acceptOrder')">
            Accept
        </v-btn>
        <v-btn
            v-if="!selectedOrder.served && selectedOrder.ready"
            color="success"
            @click="$emit('serveOrder')">
            Serve
        </v-btn>
        <v-btn
            color="error"
            @click="$emit('deleteOrder')">
            Delete Order
        </v-btn>
    </div>
</template>

<script>
    export default {
        name: "order-operations",
        props: ['selectedOrder']
    }
</script>

