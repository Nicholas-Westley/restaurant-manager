<template>
   <div class="add-item-container">
       <!--<h1>recipe</h1>-->
       <!--{{ recipe }}-->
       <!--<h1>ingredients</h1>-->
       <!--{{ recipe.ingredients }}-->
        <div v-for="ingredient in recipe.ingredients">
            <label>
                {{ ingredient.name }}
                <input type="checkbox" v-model="formData[ingredient.id]" />
            </label>
        </div>
       {{ formData }}
   </div>
</template>

<script>
    export default {
        props: ['recipe'],
        data() {
            return {
                formData: {}
            }
        }
    }
</script>

<style lang="css">
    .add-item-container {
        padding: 16px;
    }
</style>
