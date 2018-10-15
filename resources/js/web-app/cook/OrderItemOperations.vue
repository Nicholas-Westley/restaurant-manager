<template>
    <div>
        <v-btn
            v-if="!item.in_progress && !item.completed"
            @click="$emit('markItemInProgress')"
            small
            color="primary">
            Start
        </v-btn>
        <v-btn
            v-if="!item.completed && item.in_progress"
            @click="$emit('markItemCompleted')"
            small
            color="primary">
            Completed
        </v-btn>
    </div>

</template>

<script>
    export default {
        name: "order-item-operations",
        props: ['item']
    }
</script>

<style scoped>

</style>
