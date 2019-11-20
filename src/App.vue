<template>
  <div id="app">
    <navbar />

    <router-view />

    <footpage />
  </div>
</template>

<script>
import navbar from "./components/navbar.vue";
import footpage from "./components/footer.vue";

export default {
  name: "app",
  components: {
    footpage,
    navbar,
  }
};
</script>
<style>
</style>
