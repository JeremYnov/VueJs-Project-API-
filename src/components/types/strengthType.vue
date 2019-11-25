<template>
  <div class="poke-strength center capitalize">
    <div class="poke-strength-container">
      <div class="poke-strength-title text-center">
        <h2>Forces</h2>
      </div>
      <div class="strengths text-center">
        <div v-for="i in strengthtable" :key="i" class="type" v-bind:class="i">{{ i }}</div>
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
      strengthtable: []
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
            index < result.data.damage_relations.double_damage_to.length;
            index++
          ) {
            this.strengthtable.push(
              result.data.damage_relations.double_damage_to[index].name
            );
          }
        });
        axios.get(this.moreType1).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }
          for (
            let index = 0;
            index < result.data.damage_relations.double_damage_to.length;
            index++
          ) {
            this.strengthtable.push(
              result.data.damage_relations.double_damage_to[index].name
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
            index < result.data.damage_relations.double_damage_to.length;
            index++
          ) {
            this.strengthtable.push(
              result.data.damage_relations.double_damage_to[index].name
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
.strenghts {
  display: grid;
  grid-template-columns: 5fr 5fr;
  grid-gap: 0.5rem;
}
</style>