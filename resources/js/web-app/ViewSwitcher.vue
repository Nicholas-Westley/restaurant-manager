<template>

    <div>
        <v-tabs
            v-model="active"
            color="primary"
            dark
            grow
            slider-color="accent">
            <v-tab
                v-for="view in views"
                :key="view"
                @click="switchView(view)"
                ripple>
                {{ view }}
            </v-tab>
        </v-tabs>
    </div>

</template>

<script>
    export default {
        name: "view-switcher",
        props: ['currentView'],
        data() {
            return {
                active: null,
                views: ['Chef', 'Cashier', 'Customer'],
            }
        },
        watch: {
            currentView: {
                immediate: true,
                handler(newVal, oldVal) {
                    if(!newVal) return;
                    this.active = this.views.indexOf(newVal);
                }
            }
        },
        methods: {
            switchView(type) {
                this.$emit('viewSwitched', type);
            },
        },

    }
</script>

<style scoped>
    .button-selector {
        text-align: center;
        margin: 10px 0;
    }
    .blue {
        color: blue;
    }
</style>
