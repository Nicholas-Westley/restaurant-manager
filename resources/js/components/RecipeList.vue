<template>
    <div class="recipe-list">
        <h4>Recipes</h4>
        <div class="recipe-list-container">
            <div
                v-bind:style="{
                    'background-image': 'linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)), url(assets/images/' + recipe.image + ')'
                }"
                class="recipe-square" v-for="recipe in recipes">
                <h4>{{ recipe.name }}</h4>
                {{ recipe.description }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                recipes: []
            }
        },
        mounted() {
            axios.get('http://food-order-tracker.development/api/recipes')
                .then(response => (this.recipes = response.data));
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
