<template>
    <div class="add-item-container">
        <div v-if="!selectedRecipe">
            Select item to configure
        </div>
        <div v-if="selectedRecipe">
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
            <add-item
                @itemAdded="$emit('itemAdded', { recipe: selectedRecipe, ingredientIds: formData })"
                @cancelAdd="$emit('itemAdded', null)"
            />
        </div>
   </div>
</template>

<script>
    import AddItem from './AddItem';
    export default {
        name: "add-item-to-order",
        components: { AddItem },
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
                    if(!this.selectedRecipe) return;
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
