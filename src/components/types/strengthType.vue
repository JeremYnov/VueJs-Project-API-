<template>
  <div class="poke-strength center capitalize">
    <div class="poke-strength-container">
      <div class="poke-strength-title text-center">
        <h2>Forces</h2>
      </div>
      <div class="strengths text-center">
        <!-- Parcours du tableau strengthtable contenant les forces du pokemon et bind de la class avec i(nom du type fort) -->
        <div v-for="i in strengthtable" :key="i" class="type" v-bind:class="i">{{ i }}</div>
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
      strengthtable: [], //Tableau contenant les types forts du pokémon en fonction de son type
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);
//Requête axios nous permettant de réccupérer les types forts du pokémon dans l'API
    axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`).then(result => {
      if (result.status != 200) {
        window.location.replace("error.php");
      }
      //Si le pokémon possède 2 types
      if (result.data.types[1]) {
        //Les variables moreType stock l'url contenant les informations nécéssaires pour le premier type
        this.moreType = result.data.types[0].type.url;
        //Les variables moreType stock l'url contenant les informations nécéssaires pour le second type (si il en possède un)
        this.moreType1 = result.data.types[1].type.url;
        axios.get(this.moreType).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          //Boucle permettant de parcourir l'ensemble des types fort contenu dans double_damage_to
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_to.length;
            index++
          ) {
            // Ajout du/des type forts dans le tableau strengthtable
            this.strengthtable.push(
              result.data.damage_relations.double_damage_to[index].name
            );
          }
        });
//Requête axios nous permettant de réccupérer les types forts du pokémon dans l'API
        axios.get(this.moreType1).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          //Boucle permettant de parcourir l'ensemble des types fort contenu dans double_damage_to
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_to.length;
            index++
          ) {
            // Ajout du/des types forts dans le tableau strengthtable
            this.strengthtable.push(
              result.data.damage_relations.double_damage_to[index].name
            );
          }
        });
      } else { //Si le pokémon possède 1 seul type
        this.moreType = result.data.types[0].type.url;
        axios.get(this.moreType).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          //Boucle permettant de parcourir l'ensemble des types fort contenu dans double_damage_to
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_to.length;
            index++
          ) {
             // Ajout du/des types forts dans le tableau strengthtable
            this.strengthtable.push(
              result.data.damage_relations.double_damage_to[index].name
            );
          }
        });
      }
    });
  },
};
</script>

<style lang="css" scoped>
.strenghts {
  display: grid;
  grid-template-columns: 5fr 5fr;
  grid-gap: 0.5rem;
}
</style>