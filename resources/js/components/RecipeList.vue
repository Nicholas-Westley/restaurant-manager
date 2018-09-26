<template>
    <div class="recipe-list">
        <h4>Recipes</h4>
        <div class="recipe-list-container">
            <div class="recipe-square" v-for="recipe in recipes">
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
        width: 150px;
        height: 150px;
        margin: 0 10px;
        background-color: #FEFFFE;
    }
</style>
