<template>
    <div>
        <div v-for="value in settingValues">
            <h5>
                {{ value.setting.setting_name }}
            </h5>
            <setting-element
                @setSettingOption="setSettingOption($event, value)"
                :setting="value"/>
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
                settingValues: [],
            };
        },
        mounted() {
            axios.get(`settings`)
                .then(response => {
                    console.log(response)
                    this.settingValues = response.data;
                    if(!this.settingValues) this.settingValues = [];
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
