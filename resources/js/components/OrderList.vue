<template>
   <div class="order-list">
       <ul>
           <li>order 1</li>
       </ul>
   </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted!!!!')
        }
    }
</script>

<style scoped>
    .order-list {
        background-color: white;
        flex: 0.25;
    }
</style>
