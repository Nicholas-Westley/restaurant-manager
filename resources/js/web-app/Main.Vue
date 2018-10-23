<template>
    <v-app id="app">
        <!-- VIEW SWITCHER -->
        <view-switcher
            v-if="['Chef', 'Cashier'].includes(userType)"
            @viewSwitched="currentView = $event"
            :currentView="currentView"
        />
        <!-- NEW ORDER NOTIFICATION -->
        <order-receiver-viewer
            v-if="['Chef', 'Cashier'].includes(userType)"
            @switchToChef="currentView='Chef'"/>
        <!-- CHEF VIEW -->
        <keep-alive>
            <chef-controller v-if="currentView === 'Chef'"/>
        </keep-alive>
        <!-- ORDER VIEW-->
        <keep-alive>
            <order-controller
                v-if="currentView === 'Customer' || currentView === 'Cashier'"
                :assetsUrl="assetsUrl"/>
        </keep-alive>
    </v-app>
</template>

<script>
    import ChefController from 'restaurant-manager-vue-chef-library';
    import OrderController from 'restaurant-manager-vue-order-library';
    import ViewSwitcher from "./ViewSwitcher";
    import OrderReceiverViewer from "./OrderReceiverViewer";
    export default {
        name: 'App',
        props: ['assetsUrl'],
        components: {
            ChefController,
            OrderController,
            ViewSwitcher,
            OrderReceiverViewer,
        },
        data() {
            return {
                currentView: '',
                userType: '',
                event: null,
            };
        },
        created() {
            const setting = window.user_settings.find(s => s.setting.setting_key === 'user_type');
            this.userType = setting.value;
            this.currentView = this.userType;
        }
    };
</script>

<style>

</style>
