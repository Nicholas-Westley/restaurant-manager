<template>
    <div
        :style="{'outline': orderSelected ? 'thick solid #00ccff' : 'none'}"
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
        props: ['order', 'orderSelected']
  }
</script>

<style scoped>
    .order {
        background-color: white;
        cursor: pointer;
        margin: 24px 0;
        padding: 8px;
    }
</style>
