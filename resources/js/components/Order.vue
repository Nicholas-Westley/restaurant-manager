<template>
    <div>
        {{ order.recipe.name }}
    </div>
</template>

<script>
    export default {
        name: "order",
        props: ['order']
  }
</script>

<style scoped>

</style>
