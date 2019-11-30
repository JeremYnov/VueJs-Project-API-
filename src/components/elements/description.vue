<template>
  <div class="poke-description">
    <!-- Affichage de la description -->
    <p>{{ infoPokemonSpeciesDescription }}</p>
  </div>
</template>

<script>
//Import de la librairie axios pour consommer l'API
import axios from "axios";
export default {
  data() {
    return {
      id: "", //Variable qui stock l'id du pokemon
      infoPokemonSpeciesDescription: "", //Variable qui stock la description complète du pokémon
      indextable: [] //Tableau qui réccupère toutes les descriptions "fr"
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);

    //Requête axios nous permettant de réccupérer la desctiption du pokémon en francais
    axios
      .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
      .then(result => {
        if (result.status != 200) {
          window.location.replace("error.php");
        }
        //Boucle permettant de parcourir flavor_text_entries(qui contient toutes les description dans toutes les langues)
        for (
          let index = 0;
          index < result.data.flavor_text_entries.length;
          index++
        ) {
          //Si la description est francaise "fr" alors elle est ajoutée au tableau indextable
          if (result.data.flavor_text_entries[index].language.name == "fr") {
            //Ajout des descriptions "fr" dans le tableau indextable
            this.indextable.push(index);
          }
        }
        //Affectation de plusieurs description "fr" a la variable infoPokemonSpeciesDescription
        this.infoPokemonSpeciesDescription =
          result.data.flavor_text_entries[this.indextable[0]].flavor_text +
          " " +
          result.data.flavor_text_entries[this.indextable[2]].flavor_text;
      });
  }
};
</script>

<style lang="css" scoped>
.poke-description {
  font-size: 18px;
  text-align: justify;
  padding-bottom: 5%;
}
</style>