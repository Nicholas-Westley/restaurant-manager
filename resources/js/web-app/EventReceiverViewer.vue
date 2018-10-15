<template>
    <div>
        <v-alert
            :value="event && event.type === 'order_created'"
            type="error"
        >
            <div style="display: flex;">
                <div style="flex-grow: 3; color: white; font-size: 300%;">
                    Order Created
                </div>
                <v-btn @click="dismiss" large color="white">
                    OK
                </v-btn>
            </div>
        </v-alert>
    </div>
</template>

<script>
    import PusherConfig from './config/pusher';
    export default {
        name: "order-receiver-viewer",
        components: {},
        data() {
            return {
                event: null,
                audioInterval: null,
            };
        },
        mounted() {
            Pusher.logToConsole = true;
            new Pusher(PusherConfig.key, {
                cluster: PusherConfig.cluster,
                forceTLS: true})
                .subscribe(PusherConfig.channel)
                .bind(PusherConfig.events.order_received, data => this.displayEvent(data));
        },
        methods: {
            displayEvent(event) {
                this.event = event;
                const audio = new Audio('/assets/audio/correct.mp3');
                audio.play();
                this.audioInterval = setInterval(() => {
                    audio.play();
                }, 5000);
            },
            dismiss() {
                this.event = null;
                this.$emit('switchToChef');
                clearInterval(this.audioInterval);
            }
        }
    }
</script>

<style scoped>

</style>
