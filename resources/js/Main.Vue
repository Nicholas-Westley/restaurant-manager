<template>
    <div class="app-container" id="app">
        <order-list/>
        <management-pane/>
    </div>
</template>

<script>
    import OrderList from "./components/OrderList";
    import ManagementPane from "./components/ManagementPane";
    export default {
        name: 'App',
        components: {
            OrderList,
            ManagementPane
        },
        created() {},
        mounted() {},
        methods: {}
    };
</script>

<style>
    .app-container {
        display: flex;
        align-items: stretch;
        flex-direction: row;
        height: calc(100vh - 65px);
    }
</style>
