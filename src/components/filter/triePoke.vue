<template>
  <div class="poke-select">
    <select v-model="trie">
      <option value="1">Ordre Alphabétique A-Z</option>
      <option value="2">Ordre Alphabétique Z-A</option>
      <option value="3">Numéro le plus bas en premier</option>
      <option value="4">Numéro le plus haut en premier</option>
    </select>
    <button v-on:click="trie_pokemon(infoPokemon,filterName)" class="poke-select-button">Valider</button>
  </div>
</template>


<script>
export default {
  data() {
    return {
      trie: ""

    };
  },
  props: {
    infoPokemon: Array,
    FilterCheck: Boolean,
    filterName: Array
  },

  methods: {
    trie_pokemon(liste = [], liste_destination = []) {
      this.$emit("changeFilterCheck", false);
      if (this.trie == 4 || this.trie == 3) {
        for (let i = 0; i < liste.length; i++) {
          for (let index = 0; index < liste.length; index++) {
            if (index + 1 != liste.length) {
              if (liste[index + 1].id > liste[index].id) {
                let objet = liste[index];
                liste[index] = liste[index + 1];
                liste[index + 1] = objet;
              }
            }
          }
        }
        if (this.trie == 4) {
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[i];
          }
          this.$emit("changeFilterCheck", true);
        } else {
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[liste.length - 1 - i];
          }
          this.$emit("changeFilterCheck", true);
        }
      } else {
        for (let i = 0; i < liste.length; i++) {
          for (let index = 0; index < liste.length; index++) {
            if (index + 1 != liste.length) {
              if (liste[index + 1].name > liste[index].name) {
                let objet = liste[index];
                liste[index] = liste[index + 1];
                liste[index + 1] = objet;
              }
            }
          }
        }
        if (this.trie == 2) {
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[i];
          }
          this.$emit("changeFilterCheck", true);
        } else {
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[liste.length - 1 - i];
          }
          this.$emit("changeFilterCheck", true);
        }
        this.$emit("fillFilterName", liste_destination);
      }
    }
  }
};
</script>


<style>
.poke-select {
  display: flex;
}
.poke-select select {
  border: 3px solid #e91d26;
  height: 40px;
  width: 100%;
  border-radius: 10px 0 0 10px;
  padding: 0 10px;
  background: white;
  font-family: "Righteous", cursive;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  margin: 10px 0;
  cursor: pointer;
  transition: 0.6s;
}
.poke-select-button {
  border: 3px solid #e91d26;
  height: 40px;
  border-radius: 0 10px 10px 0;
  padding: 0 10px;
  background: #e91d26;
  color: white;
  font-family: "Righteous", cursive;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  margin: 10px 0;
  cursor: pointer;
  transition: 0.6s;
}
</style>