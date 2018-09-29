<template>
    <div v-if="selectedOrder">
        <h4> Order Number {{ selectedOrder.id }}</h4>
        <order-operations
            :selectedOrder="selectedOrder"
            @acceptOrder="$emit('acceptOrder', selectedOrder)"
            @deleteOrder="$emit('deleteOrder', selectedOrder)"
        />
        <div
            class="order-item"
            v-for="item in selectedOrder.order_items">
            <h4>{{ item.recipe.name }}</h4>
            <div>
                {{ item.recipe.description }}
            </div>
            <div v-for="ingredient in item.recipe.ingredients">
                <span :class="selectedIngredients[item.id][ingredient.id] ? 'selected' : 'not-selected'">
                    {{ ingredient.name }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    import OrderOperations from './OrderOperations';
    export default {
        name: "order-detail",
        props: ['selectedOrder'],
        computed: {
            selectedIngredients() {
                const selected = {};
                this.selectedOrder.order_items.forEach(item => {
                    selected[item.id] = {};
                    item.order_item_ingredient_maps.forEach(map =>{
                        selected[item.id][map.ingredient_id] = true;
                    });
                });
                return selected;
            }
        },
        components: { OrderOperations }
    }
</script>

<style scoped>
    .order-item {
        margin: 16px 0;
    }
    .selected {
        font-weight: bold;
    }
    .not-selected {
        color: #b8c2cc;
    }

</style>
