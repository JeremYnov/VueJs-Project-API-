<template>
  <div class="poke-description">
    <p>{{ infoPokemonSpeciesDescription }}</p>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      infoPokemonSpeciesDescription: "",
      indextable:[],
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
            for (
              let index = 0;
              index < result.data.flavor_text_entries.length;
              index++
            ) {
              if (result.data.flavor_text_entries[index].language.name == "fr") {
                this.indextable.push(index);
              }
            }
            this.infoPokemonSpeciesDescription = 
                result.data.flavor_text_entries[this.indextable[0]].flavor_text
                //   + " " +
                //   result.data.flavor_text_entries[this.indextable[1]].flavor_text +
                + " " +
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