<template>
    <div id="app">
        <view-switcher
            v-if="userType === 'Chef' || userType === 'Cashier'"
            @viewSwitched="viewSwitched"
            :currentView="currentView"
        />
        <div>
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
                currentView: '',
                userType: '',
            };
        },
        created() {
            const setting = window.user_settings.find(s => s.setting_key === 'user_type');
            this.currentView = setting.setting_value;
            this.userType = setting.setting_value;
        },
        methods: {
            viewSwitched(viewType) {
                this.currentView = viewType;
            }
        }
    };
</script>

<style>

</style>
