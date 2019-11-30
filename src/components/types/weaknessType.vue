<template>
  <div class="poke-weakness center capitalize">
    <div class="poke-weakness-container">
      <div class="poke-weakness-title text-center">
        <h2>Faiblesses</h2>
      </div>
      <div class="weaknesses text-center">
        <!-- Parcours du tableau weaknesstable contenant les faiblesses du pokemon et bind de la class avec i(nom du type faible) -->
        <div v-for="todo in weaknesstable" :key="todo" class="type" v-bind:class="todo">{{ todo }}</div>
      </div>
    </div>
  </div>
</template>

<script>
//Import d'axios pour consommer l'API
import axios from "axios";
export default {
  data() {
    return {
      id: "",
      weaknesstable: [],//Tableau contenant les types faible du pokémon en fonction de son type
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
      //Si le pokémon possède 2 types
      if (result.data.types[1]) {
        //Les variables moreType stock l'url contenant les informations nécéssaires
        this.moreType = result.data.types[0].type.url;
        this.moreType1 = result.data.types[1].type.url;
        axios.get(this.moreType).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          //Boucle permettant de parcourir l'ensemble des types faible contenu dans double_damage_from
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_from.length;
            index++
          ) {
            // Ajout du/des types faible dans le tableau weaknesstable
            this.weaknesstable.push(
              result.data.damage_relations.double_damage_from[index].name
            );
          }
        });
        axios.get(this.moreType1).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          //Boucle permettant de parcourir l'ensemble des types faible contenu dans double_damage_from
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_from.length;
            index++
          ) {
            // Ajout du/des types faible dans le tableau weaknesstable
            this.weaknesstable.push(
              result.data.damage_relations.double_damage_from[index].name
            );
          }
        });
      } else {//Si le pokémon possède 1 seul type 
        this.moreType = result.data.types[0].type.url;
        axios.get(this.moreType).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          //Boucle permettant de parcourir l'ensemble des types faible contenu dans double_damage_from
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_from.length;
            index++
          ) {
            // Ajout du/des types faible dans le tableau weaknesstable
            this.weaknesstable.push(
              result.data.damage_relations.double_damage_from[index].name
            );
          }
        });
      }
    });
  },

  methods: {}
};
</script>

<style lang="css" scoped>
.weaknesses {
  display: grid;
  grid-template-columns: 5fr 5fr;
  grid-gap: 0.5rem;
}
</style>