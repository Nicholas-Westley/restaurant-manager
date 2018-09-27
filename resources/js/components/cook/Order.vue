<template>
    <div @click="$emit('orderSelected', order)" class="order">
        <h2>order id: {{ order.id }}</h2>
        <div v-for="item in order.order_items">
            {{ item.recipe.name }}
        </div>

    </div>
</template>

<script>
    export default {
        name: "order",
        props: ['order']
  }
</script>

<style scoped>
    .order {
        background-color: #6cb2eb;
        padding: 16px;
        cursor: pointer;
        margin: 4px 0;
    }
</style>
