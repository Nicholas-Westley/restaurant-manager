<template>
    <div class="recipe-list">
        <div class="recipe-list-container">
            <div
                class="recipe-square" v-for="recipe in recipes"
                @click="$emit('recipeSelected', recipe)"
                :style="{
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
        props: ['recipes', 'selectedRecipe']
    }
</script>

<style scoped>
    .recipe-list {

    }

    .recipe-list-container {
        display: flex;
        flex-wrap: wrap;
    }

    .recipe-square {
        width: 160px;
        height: 150px;
        margin: 10px 10px;
        background-color: #FEFFFE;
        color: white;
        text-shadow: #1b1e21;
        padding: 8px;
        cursor: pointer;
    }
</style>
