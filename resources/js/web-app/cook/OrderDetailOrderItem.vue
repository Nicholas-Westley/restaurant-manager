<template>
    <div
        class="order-item secondary--text"
        :class="{
                'item-completed': item.completed,
                'item-in-progress': item.in_progress
             }">
        <!-- ORDER STATE INFO -->

        <h1 v-if="item.completed" class="primary--text">
            Item Completed
        </h1>

        <!-- GENERAL ORDER ITEM INFO -->
        <h4>
            {{ item.recipe.name }}
        </h4>
        <div>
            {{ item.recipe.description }}
        </div>
        <!-- ORDER OPERATIONS -->
        <order-item-operations
            :item="item"
            @markItemInProgress="$emit('markItemInProgress')"
            @markItemCompleted="$emit('markItemCompleted')"/>
        <!-- INGREDIENTS -->
        <div v-for="ingredient in item.recipe.ingredients">
            <v-label :class="selectedIngredients[item.id][ingredient.id] ? 'selected' : 'not-selected'">
                {{ ingredient.name }}
            </v-label>
        </div>
    </div>
</template>

<script>
    import OrderItemOperations from './OrderItemOperations';
    export default {
        name: "order-detail-order-item",
        props: ['item', 'selectedOrder'],
        components: { OrderItemOperations },
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
        border-top: 1px solid #b8c2cc;
        padding: 8px;
    }
    .item-completed {
        opacity: 0.5;
    }
    .item-in-progress {
        /*background-color: green;*/
        /*color: white;*/
    }
</style>
