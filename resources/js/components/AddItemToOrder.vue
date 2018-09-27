<template>
   <div class="add-item-container">
        <h1>{{ selectedRecipe.name }}</h1>
        <h3>{{ selectedRecipe.description }}</h3>
        <div v-for="ingredient in selectedRecipe.ingredients">
            <label class="ingredient-label">
                <input
                    type="checkbox"
                    class="ingredient-checkbox"
                    v-model="formData[ingredient.id]"
                    :disabled="!ingredient.optional"/>
                {{ ingredient.name }}
            </label>
        </div>
        <button @click="$emit('itemAdded', { recipe: selectedRecipe, ingredientIds: formData })" class="btn btn-primary">Add Item To Order</button>
        <button @click="$emit('itemAdded', null)" class="btn btn-danger">Cancel</button>
    </div>
</template>

<script>
    export default {
        props: ['selectedRecipe'],
        data() {
            return {
                formData: {}
            }
        },
        watch: {
            selectedRecipe: {
                immediate: true,
                handler(newVal, oldVal) {
                    this.formData = {};
                    this.selectedRecipe.ingredients.forEach(i => (this.formData[i.id] = i.selected_by_default));
                }
            }
        }
    }
</script>

<style scoped>
    .add-item-container {
        padding: 16px;
    }
    .ingredient-label {
    }
</style>
