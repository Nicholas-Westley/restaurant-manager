<template>
    <v-layout>
        <v-flex v-for="recipe in recipes" :key="recipe.id" xs6 style="padding: 12px;">
            <v-card >
                <v-img
                        :src="'/assets/images/' + recipe.image"
                        aspect-ratio="3"
                ></v-img>

                <v-card-title primary-title>
                    <div>
                        <h3 class="headline mb-0">{{ recipe.name }}</h3>
                        <div>{{ recipe.description }} </div>
                    </div>
                </v-card-title>

                <v-card-actions>
                    <v-btn
                        @click="$emit('recipeSelected', recipe)"
                        flat
                        color="orange">
                        Order
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        props: ['recipes']
    }
</script>

<style scoped lang="scss">





</style>
