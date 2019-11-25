<template>
  <div class="poke-name">
    <p>{{ infoPokemonSpeciesName}}</p>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      infoPokemonSpeciesName: ""
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);
    axios
      .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
      .then(result => {
        if (result.status != 200) {
          window.location.replace("error.php");
        }
        this.infoPokemonSpeciesName = result.data.names[6].name;
      });
  }
};
</script>

<style lang="css" scoped>
.poke-name {
  color: #3b3b3b;
  font-size: 30px;
}
</style>