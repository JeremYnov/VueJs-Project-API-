<template>
  <div class="poke-categorie center">
    <!-- Affichage de la catégorie -->
    <p>{{ infoPokemonSpeciesCategory }}</p>
  </div>
</template>

<script>
//Import de la librairie axios pour consommer l'API
import axios from "axios";
export default {
  data() {
    return {
      infoPokemonSpeciesCategory: "" //Variable qui stock la catégorie du pokémon
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);
    //Requête axios nous permettant de réccupérer la catédorie du pokémon en francais
    axios
      .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
      .then(result => {
        if (result.status != 200) {
          window.location.replace("error.php");
        }
        //Stockage de la catégorie du pokémon dans la variable infoPokemonSpeciesCategory
        this.infoPokemonSpeciesCategory = result.data.genera[6].genus;
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