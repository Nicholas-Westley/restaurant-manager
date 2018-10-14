<template>
    <div class="button-selector">

        <v-btn-toggle v-model="highlight">
            <v-btn @click="switchView('Chef')" color="orange" value="Chef">
                Chef
            </v-btn>
            <v-btn @click="switchView('Cashier')" color="orange" value="Cashier">
                Cashier
            </v-btn>
            <v-btn @click="switchView('Customer')" color="orange" value="Customer">
                Customer
            </v-btn>
        </v-btn-toggle>
    </div>
</template>

<script>
    export default {
        name: "view-switcher",
        props: ['currentView'],
        data() {
            return {
                highlight: null
            }
        },
        watch: {
            currentView: {
                immediate: true,
                handler(newVal, oldVal) {
                    if(!newVal) return;
                    this.highlight = newVal;
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
