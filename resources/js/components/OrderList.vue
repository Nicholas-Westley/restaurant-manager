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

<style lang="css">
    .order-list {
        /*flex: 1 auto;*/
        /*height: auto !important;*/
        /*min-height: calc(100% - 165px);*/
        background-color: white;
        flex: 0.3;
    }
</style>
