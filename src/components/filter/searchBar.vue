<template>
<div>
  <div class="searchbar">
    <input type="text" v-model="name" placeholder="Rechercher..." class="poke-searchbar" />
    <button v-on:click="filter()" class="searchbar-button click">
      <i class="fas fa-search"></i>
    </button>
</div>
    <div>
      <p
        v-if="FilterCheck == false"
      >Aucun Pokémon selectionné (ne pas oublier la majuscule pour la premiere lettre)</p>
      <button v-on:click="pokedex()" v-else class="poke-pokedex click">Afficher le pokedex entier</button>
    </div>
  
  </div>
</template>


<script>
export default {
  data() {
    return {
      name: ""
    };
  },

  props: {
    infoPokemon: Array,
    FilterCheck: Boolean,
    filterName: Array
  },

  methods: {
    // filter => permet de taper le nom d'un pokemon ou son id et de le trouver
    // fonction qui marche en like, exemple tu tape "A" => tout les pokemons commençant par A s'afficheront
    filter() {
      let filterNameCompo = [];
      let validate = 0;
      let info;
      for (let index = 0; index < this.infoPokemon.length; index++) {
        if (
          this.infoPokemon[index].name.indexOf(this.name) === 0 ||
          this.infoPokemon[index].id == this.name
        ) {
          this.$emit("changeFilterCheck", true);
          validate = 1;
          if (this.infoPokemon[index].type2) {
            info = {
              name: this.infoPokemon[index].name,
              id: this.infoPokemon[index].id,
              image: this.infoPokemon[index].image,
              type1: this.infoPokemon[index].type1,
              type2: this.infoPokemon[index].type2
            };
          } else {
            info = {
              name: this.infoPokemon[index].name,
              id: this.infoPokemon[index].id,
              image: this.infoPokemon[index].image,
              type1: this.infoPokemon[index].type1
            };
          }
          filterNameCompo.push(info);
        }
      }
      this.$emit("fillFilterName", filterNameCompo);
      if (validate == 0) {
        this.$emit("changeFilterCheck", false);
      }
    },
    // pokedex => si on clique sur le bouton retour au pokedex
    // alors on enleve le mode filtre
    pokedex() {
      this.FilterCheck = false;
      this.$emit("changeFilterCheck", false);
    }
  }
};
</script>


<style>
.searchbar {
  display: flex;
  padding: 10px 0;
}
.poke-searchbar {
  border: 3px solid #e91d26;
  height: 40px;
  width: 200px;
  border-radius: 50px 0 0 50px;
  padding: 0 10px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
}
.searchbar-button {
  border: 3px solid #e91d26;
  background: #e91d26;
  color: white;
  height: 46px;
  border-radius: 0 50px 50px 0;
  padding: 0 12px;
  cursor: pointer;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
}
.searchbar-button img {
  height: 20px;
  width: 20px;
}

.fa-search {
  font-size: 20px;
}

.poke-pokedex {
  border: 3px solid #e91d26;
  height: 40px;
  width: 100%;
  border-radius: 20px;
  padding: 0 10px;
  background: white;
  font-family: "Righteous", cursive;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  margin: 10px 0;
  transition: 0.6s;
}

.poke-pokedex:hover {
  background: #e91d26;
  color: white;
}

.click {
  cursor: pointer;
}
</style>