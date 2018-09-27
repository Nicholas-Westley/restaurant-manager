<template>
    <div class="management-pane">
        <div class="action-pane">
            <!-- RECIPE LIST -->
            <recipe-list
                :recipes="recipes"
                @recipeSelected="recipeSelected"
                :selectedRecipe="selectedRecipe"
            />
            <!-- REFINE ITEM TO ADD TO ORDER -->
            <add-item-to-order
                v-if="selectedRecipe"
                :selectedRecipe="selectedRecipe"
                @itemAdded="itemAdded"
            />
        </div>
        <div class="info-pane">
            <!-- ORDER IN PROCESS -->
            <order-being-created
                :currentOrder="currentOrder"
                :submittable="selectedRecipe !== null"
                :selectedRecipe="selectedRecipe"
                @itemRemoved="itemRemoved"
                @submitOrder="submitOrder"
            />
        </div>
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
                axios.get(`recipe/${recipe.id}`)
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
                console.log(this.currentOrder)
                axios.post('order', this.currentOrder)
                    .then(response => {
                        console.log(response);
                    });
            },
        },
        mounted() {
            axios.get('recipes')
                .then(response => (this.recipes = response.data));
        }
    }
</script>

<style scoped>
    .management-pane {
        background-color: #FAFAFF;
        flex: 0.9;
        display: flex;
        flex-direction: row;
    }
    .action-pane {
        display: flex;
        flex-direction: column;
        width: 65%;
        padding: 16px;
    }
    .info-pane {
        background-color: #FAFFFA;
        width: 35%;
        padding: 16px;
    }
</style>
