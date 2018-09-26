<template>
   <div class="management-pane">
       <recipe-list
           :recipes="recipes"
           @recipeSelected="recipeSelected"
       />
       <add-item-to-order :recipe="selectedRecipe"/>
   </div>
</template>

<script>
    import RecipeList from "./RecipeList";
    import AddItemToOrder from "./AddItemToOrder";
    export default {
        components: {
            RecipeList,
            AddItemToOrder
        },
        data () {
            return {
                selectedRecipe: null,
                recipes: []
            }
        },
        methods: {
            recipeSelected(recipe) {
                axios.get(`recipe/${recipe.id}`)
                    .then(response => this.selectedRecipe = response.data);
            }
        },
        mounted() {
            axios.get('recipes')
                .then(response => (this.recipes = response.data));
        }
    }
</script>

<style lang="css">
    .management-pane {
        background-color: #FAFAFF;
        flex: 0.7;
        flex-direction: column;
        padding: 16px;
    }
</style>
