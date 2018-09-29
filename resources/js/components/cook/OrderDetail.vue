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
            v-for="item in selectedOrder.order_items"
            :class="item.completed ? 'item-completed' : ''">
            <!-- ORDER STATE INFO -->
            <span v-if="item.completed">Item Completed</span>
            <!-- GENERAL ORDER ITEM INFO -->
            <h4>{{ item.recipe.name }}</h4>
            <div> {{ item.recipe.description }} </div>
            <!-- ORDER OPERATIONS -->
            <order-item-operations
                :item="item"
                @markItemInProgress="$emit('markItemInProgress', item)"
                @markItemCompleted="$emit('markItemCompleted', item)"/>
            <!-- INGREDIENTS -->
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
    import OrderItemOperations from './OrderItemOperations';
    export default {
        name: "order-detail",
        props: ['selectedOrder'],
        components: { OrderOperations, OrderItemOperations },
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
        }
    }
</script>

<style scoped>
    .order-item {
        margin: 16px 0;
        border-top: 1px solid #b8c2cc;
        padding-top: 4px;
    }
    .selected {
        font-weight: bold;
    }
    .not-selected {
        color: #b8c2cc;
    }
    .item-completed {
        opacity: 0.3;
    }

</style>
