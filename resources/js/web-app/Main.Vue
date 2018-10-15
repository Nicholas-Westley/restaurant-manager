<template>
    <v-app id="app">
        <view-switcher
            v-if="['Chef', 'Cashier'].includes(userType)"
            @viewSwitched="viewSwitched"
            :currentView="currentView"
        />

        <div v-if="['Chef', 'Cashier'].includes(userType)">
            <event-receiver-viewer @switchToChef="currentView='Chef'"/>
        </div>

        <template v-if="currentView === 'Chef'">
            <cook-controller/>
        </template>
        <template v-if="currentView === 'Customer' || currentView === 'Cashier'">
            <order-controller/>
        </template>

    </v-app>
</template>

<script>
    import CookController from "./cook/Controller";
    import OrderController from "./order/Controller";
    import ViewSwitcher from "./ViewSwitcher";
    import EventReceiverViewer from "./EventReceiverViewer";
    export default {
        name: 'App',
        components: {
            CookController,
            OrderController,
            ViewSwitcher,
            EventReceiverViewer,
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
            this.setupEvents();
        },
        methods: {
            switchToChef() {
                console.warn("SWITCHING TO CHEF")
            },
            viewSwitched(viewType) {
                this.currentView = viewType;
            },
            setupEvents() {
                // Pusher.logToConsole = true;

                var pusher = new Pusher('27a7024685e842c6a2d3', {
                    cluster: 'ap1',
                    forceTLS: true
                });

                var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                    this.event = data;
                });
            }
        }
    };
</script>

<style>

</style>
