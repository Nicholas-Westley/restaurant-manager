<template>
    <div id="app">
        <view-switcher
            @viewSwitched="viewSwitched"
            :currentView="currentView"
        />
        <div class="panel-container">
            <template v-if="currentView === 'Chef'">
                <cook-controller/>
            </template>
            <template v-if="currentView === 'Customer' || currentView === 'Cashier'">
                <order-controller/>
            </template>
        </div>
    </div>
</template>

<script>
    import CookController from "./cook/Controller";
    import OrderController from "./order/Controller";
    import ViewSwitcher from "./ViewSwitcher";
    export default {
        name: 'App',
        components: {
            CookController,
            OrderController,
            ViewSwitcher
        },
        data() {
            return {
                currentView: 'Chef'
            }
        },
        created() {},
        mounted() {
            console.warn("*********")
            console.log(this.$router);
            console.log(this);
        },
        methods: {
            viewSwitched(viewType) {
                this.currentView = viewType;
                console.log(this.restaurant_id);
            }
        }
    };
</script>

<style>
    .panel-container {
        display: flex;
        align-items: stretch;
        flex-direction: row;
        height: calc(100vh - 115px);
    }
</style>
