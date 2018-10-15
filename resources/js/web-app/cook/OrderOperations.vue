<template>
    <div>
        <v-btn
            v-if="!order.accepted"
            color="primary"
            @click="$emit('acceptOrder')"
            small>
            Accept
        </v-btn>
        <v-btn
            v-if="!order.served && order.ready"
            color="primary"
            @click="$emit('serveOrder')"
            small>
            Serve
        </v-btn>
        <v-btn
            v-if="!hideDelete"
            color="secondary"
            @click="$emit('deleteOrder')"
            small>
            Delete Order
        </v-btn>
    </div>
</template>

<script>
    export default {
        name: "order-operations",
        props: ['order', 'hideDelete']
    }
</script>

