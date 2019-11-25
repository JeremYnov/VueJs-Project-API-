<template>
  <div class="poke-type-container">
    <div class="poke-type-title text-center">
      <h2>Type</h2>
    </div>
    <div class="types text-center">
      <div v-for="(todo, value) in typefilter" :key=" value + '-todo1'">
        <div
          v-if=" pokeType.type1 == typefilter[value]"
          class="type click first-type"
          v-bind:class="typefilter[value]"
        >{{ pokeType.type1 }}</div>
      </div>
      <div v-for="(todo, value) in typefilter" :key=" value + '-todo2'">
        <div
          v-if=" pokeType.type2 == typefilter[value]"
          class="type click second-type"
          v-bind:class="typefilter[value]"
        >{{ pokeType.type2 }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      id: "",
      pokeType:[],
      typefilter: [
          "fire",
          "poison",
          "normal",
          "fighting",
          "flying",
          "ground",
          "rock",
          "bug",
          "steel",
          "water",
          "grass",
          "electric",
          "psychic",
          "ice",
          "dragon",
          "dark",
          "fairy",
          "shadow",
          "ghost"
        ],
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);

    axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`).then(result => {
      if (result.status != 200) {
        window.location.replace("error.php");
      }
      if (result.data.types[1]) {
        this.pokeType = {
          type1: result.data.types[0].type.name,
          type2: result.data.types[1].type.name
          }
      } else {
        this.pokeType = {
          type1: result.data.types[0].type.name
          }
      }
    });
  },

  methods: {}
};
</script>

<style lang="css" scoped>
.strenghts {
  display: grid;
  grid-template-columns: 5fr 5fr;
  grid-gap: 0.5rem;
}
</style>