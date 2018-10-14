<template>
    <div v-if="setting.setting_type === 'radio'">

        <div v-for="option in setting.setting_options">
            <input
                @click="$emit('setSettingOption', option)"
                type="radio"
                :name="option.setting_id"
                :id="option.id"
                :checked="option.name === setting.setting_value.value"/>
            <label
                :for="option.id">
                {{ option.name }}
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'setting-element',
        props: ['setting']
    }
</script>

<style scoped>

</style>
