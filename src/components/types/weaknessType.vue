<template>
  <div class="poke-weakness center capitalize">
    <div class="poke-weakness-container">
      <div class="poke-weakness-title text-center">
        <h2>Faiblesses</h2>
      </div>
      <div class="weaknesses text-center">
        <div v-for="todo in weaknesstable" :key="todo" class="type" v-bind:class="todo">{{ todo }}</div>
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
      weaknesstable: []
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
        this.moreType = result.data.types[0].type.url;
        this.moreType1 = result.data.types[1].type.url;
        axios.get(this.moreType).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_from.length;
            index++
          ) {
            this.weaknesstable.push(
              result.data.damage_relations.double_damage_from[index].name
            );
          }
        });
        axios.get(this.moreType1).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_from.length;
            index++
          ) {
            this.weaknesstable.push(
              result.data.damage_relations.double_damage_from[index].name
            );
          }
        });
      } else {
        this.moreType = result.data.types[0].type.url;
        axios.get(this.moreType).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_from.length;
            index++
          ) {
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