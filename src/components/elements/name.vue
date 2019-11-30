<template>
  <div class="poke-name">
    <!-- Affichage du nom du pokémon en francais -->
    <p>{{ infoPokemonSpeciesName}}</p>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      infoPokemonSpeciesName: "", //Variable qui stock le nom du pokémon (en francais)
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);

    //Requête axios nous permettant de réccupérer le nom du pokémon en francais
    axios
      .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
      .then(result => {
        if (result.status != 200) {
          window.location.replace("error.php");
        }
        //Affectation du nom reccupéré a la variable infoPokemonSpeciesName
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