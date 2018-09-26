<template>
    <div class="recipe-list">
        <h4>Select and Item to order</h4>
        <div class="recipe-list-container">
            <div
                class="recipe-square" v-for="recipe in recipes"
                @click="onRecipeClicked(recipe)"
                v-bind:style="{
                    'background-image': 'linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)), url(assets/images/' + recipe.image + ')',
                    'outline': selectedRecipe && selectedRecipe.id === recipe.id ? 'thick solid #00ccff' : 'none',
                }">
                <h4>{{ recipe.name }}</h4>
                {{ recipe.description }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['recipes'],
        data () {
            return {
                selectedRecipe: null
            }
        },
        methods: {
            onRecipeClicked(recipe) {
                this.selectedRecipe = recipe;
                this.$emit('recipeSelected', recipe);
            }
        }
    }
</script>

<style lang="css">
    .recipe-list {

    }

    .recipe-list-container {
        display: flex;
    }

    .recipe-square {
        width: 200px;
        height: 150px;
        margin: 0 10px;
        background-color: #FEFFFE;
        color: white;
        text-shadow: #1b1e21;
        padding: 8px;
        cursor: pointer;
    }
</style>
