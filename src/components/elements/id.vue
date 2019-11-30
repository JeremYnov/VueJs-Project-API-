<template>
  <div class="poke-id">
    <!-- Affichage de l'id -->
    <p v-if="id < 10">N°00{{id}}</p>
    <p v-else-if="id < 100">N°0{{id}}</p>
    <p v-else>N°{{id}}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: "" //Variable qui stock l'id du pokémon
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);
  }
};
</script>

<style lang="css" scoped>
.poke-id {
  color: grey;
  font-size: 30px;
  padding-right: 10px;
}
</style>