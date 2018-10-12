<template>
    <div class="button-selector">
        <button
            class="btn"
            :class="currentView === 'Chef' ? 'btn-primary' : 'btn-secondary'"
            @click="$emit('viewSwitched', 'Chef')">
            Chef
        </button>
        <button
            class="btn"
            :class="currentView === 'Cashier' ? 'btn-primary' : 'btn-secondary'"
            @click="$emit('viewSwitched', 'Cashier')">
            Cashier
        </button>
        <button
            class="btn"
            :class="currentView === 'Customer' ? 'btn-primary' : 'btn-secondary'"
            @click="$emit('viewSwitched', 'Customer')">
            Customer
        </button>
    </div>
</template>

<script>
    export default {
        name: "view-switcher",
        props: ['currentView']
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
