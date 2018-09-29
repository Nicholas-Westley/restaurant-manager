<template>
    <div
        :class="{
            'awaiting-acceptance': !order.accepted,
            'selected': selectedOrder && selectedOrder.id === order.id,
            'in-progress': order.accepted && !order.completed,
            'ready': order.ready,
            'served': order.served
        }"
        @click="$emit('orderSelected', order)" class="order">
        <h2>order id: {{ order.id }}</h2>
        <div v-for="item in order.order_items">
            {{ item.recipe.name }}
        </div>

    </div>
</template>

<script>
    export default {
        name: "order",
        props: ['order', 'selectedOrder']
  }
</script>

<style scoped>
    .order {
        background-color: white;
        cursor: pointer;
        padding: 8px;
        box-shadow:inset 0 0 0 1px #b8c2cc;
    }
    .awaiting-acceptance {
        color: white;
        background-color: red;
    }
    .in-progress {
        color: white;
        background-color: orange;
    }
    .ready {
        color: white;
        background-color: green;
    }
    .served {
        background-color: #b8c2cc;
        color: black;
        opacity: 0.2;
        box-shadow:inset 0 0 0 1px #555;

    }
    .selected {
        box-shadow:inset 0 0 0 4px #00ccff;
    }
</style>
