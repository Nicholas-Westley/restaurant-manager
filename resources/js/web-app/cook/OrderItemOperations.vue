<template>
    <div>
        <v-btn
            v-if="!item.in_progress && !item.completed"
            @click="$emit('markItemInProgress')"
            color="success">
            Start
        </v-btn>
        <v-btn
            v-if="!item.completed && item.in_progress"
            @click="$emit('markItemCompleted')"
            color="success">
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
