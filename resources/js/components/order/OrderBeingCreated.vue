<template>
    <div class="order-being-created">
        <div v-if="!currentOrder.length">
            No items in Order
        </div>
        <div v-else>
            <!-- SUBMIT -->
            <submit-order
                @submitOrder="$emit('submitOrder')"
                :submittable="!selectedRecipe"/>
            <!-- LIST CURRENT -->
            <div class="order-item" v-for="(item, index) in currentOrder">
                <h4>
                    {{index+1 }}: {{ item.recipe.name }}
                    <div
                        class="float-right"
                        @click="$emit('itemRemoved', index)"
                        style="cursor: pointer"
                        title="Remove Item"
                    >
                        x
                    </div>
                </h4>
                <h5>{{ item.recipe.description }}</h5>
                <div class="ingredients-list">
                    <div v-for="ingredient in item.recipe.ingredients">
                        <span :class="item.ingredientIds[ingredient.id] ? 'hasIngredient' : 'notIngredient'">
                            {{ ingredient.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SubmitOrder from "./SubmitOrder";
export default {
    name: "OrderBeingCreated",
    props: ['submittable', 'currentOrder', 'selectedRecipe'],
    components: { SubmitOrder }
}
</script>

<style scoped>
    .order-being-created {
        padding: 16px;
    }
    .order-item {
        padding: 16px 0;
    }
    .ingredients-list {
        padding: 0 16px;
    }
    .hasIngredient {
        font-weight: bold;
    }
    .notIngredient {
        color: #ccc;
    }
</style>
