<template>
    <div class="my-component">
        <h1 v-if="isVisible">{{ msg }}</h1>
        <button v-on:click="ToggleVisibility">Toggle Visibility</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            msg: 'Hello, Vue.js!',
            isVisible: true
        }
    },
    methods: {
        ToggleVisibility() {
            this.isVisible = !this.isVisible
        }
    }
}
</script>

<style scoped>
h1 {
    color: blue;
}
</style>