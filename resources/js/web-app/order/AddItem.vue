<template>
    <div>
        <button @click="$emit('itemAdded')" class="btn btn-primary">Add Item To Order</button>
        <button @click="$emit('cancelAdd')" class="btn btn-danger">Cancel</button>
    </div>
</template>

<script>
  export default {
    name: "add-item"
  }
</script>
