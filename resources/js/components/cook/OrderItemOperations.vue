<template>
    <div>
        <button
            v-if="!item.in_progress && !item.completed"
            class="btn btn-secondary"
            @click="$emit('markItemInProgress')">
            In Progress</button>
        <button
            v-if="!item.completed && item.in_progress"
            class="btn btn-secondary"
            @click="$emit('markItemCompleted')">
            Completed</button>
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
