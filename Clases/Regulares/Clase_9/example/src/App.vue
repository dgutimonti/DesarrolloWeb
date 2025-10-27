<template>
  <div class="app">
    <img alt="Vue logo" src="./assets/logo.png" />
    <div>
      {{ message }}
      <p>{{ saludo }}</p>
    </div>
  </div>
  
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      message: 'Hello vue!',
      saludo: 'hola vue'
    }
  }
}
</script>

<style>
.app {
  text-align: center;
}
</style>
