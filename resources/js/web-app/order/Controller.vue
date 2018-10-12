<template>
    <div class="order-pane">
        <!-- RECIPE LIST -->
        <recipe-list
            v-if="!selectedRecipe"
            :recipes="recipes"
            class="order-column recipe-list"
            @recipeSelected="recipeSelected"
        />

        <!-- REFINE ITEM TO ADD TO ORDER -->
        <add-item-to-order
            v-if="selectedRecipe"
            class="order-column add-item-to-order"
            :selectedRecipe="selectedRecipe"
            @itemAdded="itemAdded"
        />

        <!-- ORDER IN PROCESS -->
        <order-being-created
            v-if="selectedRecipe || currentOrder.length"
            class="order-column order-being-created"
            :currentOrder="currentOrder"
            :submittable="selectedRecipe !== null"
            :selectedRecipe="selectedRecipe"
            @itemRemoved="itemRemoved"
            @submitOrder="submitOrder"
        />
    </div>
</template>

<script>
    import RecipeList from "./RecipeList";
    import AddItemToOrder from "./AddItemToOrder";
    import OrderBeingCreated from "./OrderBeingCreated";
    export default {
        components: { RecipeList, AddItemToOrder, OrderBeingCreated },
        data () {
            return {
                selectedRecipe: null,
                recipes: [],
                currentOrder: []
            }
        },
        methods: {
            recipeSelected(recipe) {
                if(this.selectedRecipe && this.selectedRecipe.id === recipe.id) return this.selectedRecipe = null;
                const url = `restaurants/${window.restaurant}/recipes/${recipe.id}`;
                axios.get(url)
                    .then(response => this.selectedRecipe = response.data);
            },
            itemAdded(itemAdded) {
                if(itemAdded) this.currentOrder.push(itemAdded);
                this.selectedRecipe = null;
            },
            itemRemoved(index) {
                this.currentOrder.splice(index, 1);
            },
            submitOrder() {
                axios.post('orders', {items: this.currentOrder})
                    .then(response => console.log(response))
                    .catch(error => {
                        console.log(error.response)
                    });
                this.currentOrder = [];
            },
        },
        mounted() {
            axios.get(`restaurants/${window.restaurant}/recipes`)
                .then(response => (this.recipes = response.data));
        }
    }
</script>

<style scoped>

</style>
