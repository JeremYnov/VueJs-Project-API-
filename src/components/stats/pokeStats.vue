<template>
  <div class="poke-stats">
    <p>{{infoPokemonStatSpeed.name}}: {{infoPokemonStatSpeed.basicstat}}</p>
    <p>{{infoPokemonStatSpecialDefense.name}}: {{infoPokemonStatSpecialDefense.basicstat}}</p>
    <p>{{infoPokemonStatSpecialAttack.name}}: {{infoPokemonStatSpecialAttack.basicstat}}</p>
    <p>{{infoPokemonStatDefense.name}}: {{infoPokemonStatDefense.basicstat}}</p>
    <p>{{infoPokemonStatAttack.name}}: {{infoPokemonStatAttack.basicstat}}</p>
    <p>{{infoPokemonStatHealth.name}}: {{infoPokemonStatHealth.basicstat}}</p>
    
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      id: "", //Variable qui stock l'id du pokémon
      infoPokemonStatSpeed: [], //Variable qui stock la stat speed
      infoPokemonStatSpecialDefense: [], //Variable qui stock la stat defense spécial
      infoPokemonStatSpecialAttack: [], //Variable qui stock la stat attaque spécial
      infoPokemonStatDefense: [], //Variable qui stock la stat defense
      infoPokemonStatAttack: [], //Variable qui stock la stat attaque
      infoPokemonStatHealth: [], //Variable qui stock la stat vie
      
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);
    //Requête axios nous permettant de réccupérer l'image du pokémon
    axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`).then(result => {
      if (result.status != 200) {
        window.location.replace("error.php");
      }
      //Affectation de l'image a la variable infoPokemonImage
      this.infoPokemonStatSpeed = {
        name: result.data.stats[0].stat.name,
        basicstat: result.data.stats[0].base_stat
      };
      this.infoPokemonStatSpecialDefense = {
        name: result.data.stats[1].stat.name,
        basicstat: result.data.stats[1].base_stat
      };
      this.infoPokemonStatSpecialAttack = {
        name: result.data.stats[2].stat.name,
        basicstat: result.data.stats[2].base_stat
      };
      this.infoPokemonStatDefense = {
        name: result.data.stats[3].stat.name,
        basicstat: result.data.stats[3].base_stat
      };
      this.infoPokemonStatAttack = {
        name: result.data.stats[4].stat.name,
        basicstat: result.data.stats[4].base_stat
      };
      this.infoPokemonStatHealth = {
        name: result.data.stats[5].stat.name,
        basicstat: result.data.stats[5].base_stat
      };
      
    });
  }
};
</script>

<style lang="css" scoped>
</style>