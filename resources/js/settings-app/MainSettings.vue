<template>
    <div>
        <div v-for="setting in settings">
            <h5>
                {{ setting.setting_name }}
            </h5>
            <setting-element
                @setSettingOption="setSettingOption($event, setting)"
                :setting="setting"/>
        </div>
    </div>
</template>

<script>
    import SettingElement from './SettingElement';
    export default {
        name: 'main-settings',
        components: { SettingElement },
        data() {
            return {
                settings: [],
            };
        },
        mounted() {
            axios.get(`settings`)
                .then(response => {
                    this.settings = response.data;
                    if(!this.settings) this.settings = [];
                });
        },
        methods: {
            setSettingOption(option, setting) {
                axios.post(`settings/${setting.id}`, { data: { value: option.name } , _method: 'patch'})
                    .then(response => console.log(response))
                    .catch(error => console.error(error));
            }
        }

    }
</script>

<style scoped>

</style>
