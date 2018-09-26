<template>
   <div class="management-pane">
       <recipe-list/>
   </div>
</template>

<script>
    import RecipeList from "./RecipeList";
    export default {
        components: {
            RecipeList
        },
        mounted() {}
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
