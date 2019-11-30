<template>
  <div class="poke-type center capitalize">
    <div class="poke-type-container">
      <div class="poke-type-title text-center">
        <h2>Type</h2>
      </div>
      <div class="types text-center">
        <!-- Parcours de la liste typefilter -->
        <div v-for="(todo, value) in typefilter" :key=" value + '-todo1'">
          <!-- Si le type du pokemon pokeType.type1 est égale un élément du tableau typefilter alors la classe de la div sera bind par son nom ce qui permettra de lui appliquer un style -->
          <div
            v-if=" pokeType.type1 == typefilter[value]"
            class="type click first-type"
            v-bind:class="typefilter[value]"
          >{{ pokeType.type1 }}</div>
        </div>
        <!-- Parcours de la liste typefilter -->
        <div v-for="(todo, value) in typefilter" :key=" value + '-todo2'">
          <!-- Si le type du pokemon pokeType.type2 est égale un élément du tableau typefilter alors la classe de la div sera bind par son nom ce qui permettra de lui appliquer un style -->
          <div
            v-if=" pokeType.type2 == typefilter[value]"
            class="type click second-type"
            v-bind:class="typefilter[value]"
          >{{ pokeType.type2 }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      id: "", //Variable qui stock l'id du pokémon et qui nous permet de réccupérer les infos du pokémon avec le axios.get
      pokeType: [], //Objet qui stock le ou les types du pokemon
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
      ] //Tableau contenant tous les types de pokemon et qui nous permettra d'attribuer une class
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);
      //Requête axios permettant d'accéder aux infos du pokémon stockées dans l'api grace a son id
    axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`).then(result => {
      if (result.status != 200) {
        window.location.replace("error.php");
      }
      //Dans le cas ou le pokémon a 2 types
      if (result.data.types[1]) {
        this.pokeType = {
          type1: result.data.types[0].type.name,
          type2: result.data.types[1].type.name
        };
      }
      //Dans le cas ou le pokémon n'a qu'un seul type
      else {
        this.pokeType = {
          type1: result.data.types[0].type.name
        };
      }
    });
  },
};
</script>

<style lang="css" scoped>
.poke-type-container {
  padding-bottom: 10px;
}
.first-type {
  margin-right: 0.5rem;
}
.types {
  display: flex;
}
</style>