<template>
    <div>
        <button
            v-if="!selectedOrder.accepted"
            class="btn btn-danger"
            @click="$emit('acceptOrder')">
            Accept</button>
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

