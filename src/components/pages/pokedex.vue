<template>
  <section class="background">
    <div v-if="loading == true">
      <ProcessBar />
    </div>
    <div v-else id="pokedex">
      <div class="pokedex-content-container">
        <div id="filter" class="poke-filter">
          <div class="poke-filter-container">
            <div class="poke-logo-filter center">
              <img src="../../assets/icons/icon-pokeball.png" alt />
            </div>
               <ButtonPage/>
            <p> {{FilterCheck}} </p>
            <Search :FilterCheck="FilterCheck" :filterName="filterName" :infoPokemon="infoPokemon"/>

            <!-- <div class="searchbar">
              <input type="text" v-model="name" placeholder="Rechercher..." class="poke-searchbar" />
              <button v-on:click="filter(100000000000)" class="searchbar-button click">
                <i class="fas fa-search"></i>
              </button>
            </div>

            <p
              v-if="FilterCheck == false"
            >Aucun Pokémon selectionné (ne pas oublier la majuscule pour la premiere lettre)</p>

            <button
              v-on:click="pokedex()"
              v-else
              class="poke-pokedex click"
            >Afficher le pokedex entier</button> -->




            <div class="poke-select">
              <select v-model="trie">
                <option value="1">Ordre Alphabétique A-Z</option>
                <option value="2">Ordre Alphabétique Z-A</option>
                <option value="3">Numéro le plus bas en premier</option>
                <option value="4">Numéro le plus haut en premier</option>
              </select>
              <button
                v-on:click="trie_pokemon(infoPokemon,filterName)"
                class="poke-select-button"
              >Valider</button>
            </div>
            <div class="poke-filter-type capitalize">
              <div
                v-for="(todo, index) in typefilter"
                :key=" index + '-todo1'"
                class="type-container center"
              >
                <div
                  v-on:click="filter(index)"
                  class="type click"
                  v-bind:class="typefilter[index]"
                >{{ typefilter[index] }}</div>
              </div>
            </div>
            <div class="item-page center">
              <router-link to="/pokeitem">
                <a class="item-page-button">
                  <img src="../../assets/icons/icons8-pokebag-50.png" alt /> Voir les items
                </a>
              </router-link>
            </div>
          </div>
        </div>

        <div class="poke-container">
          <div v-if="FilterCheck == false">
            <div class="poke-wrapper">
              <div
                v-on:click="url(value.id)"
                v-for="(value, count) in filterPage"
                :key=" count + '-value'"
                class="pokemon click"
              >
                <a>
                  <div class="pokedex-image">
                    <img :src="value.image" alt />
                  </div>
                  <div class="poke-infos capitalize">
                    <div class="pokedex-id">
                      <p v-if="value.id < 10">N°00{{ value.id}}</p>
                      <p v-else-if="value.id <= 100">N°0{{ value.id}}</p>
                      <p v-else>N°{{ value.id + 1}}</p>
                    </div>
                    <div class="pokedex-name">
                      <p>{{ value.name }}</p>
                    </div>
                    <div class="pokedex-type">
                      <div v-for="(todo, i) in typefilter" :key=" i + '-todo1'">
                        <div
                          v-if=" value.type1 == typefilter[i]"
                          class="type click"
                          v-bind:class="typefilter[i]"
                        >{{ value.type1 }}</div>
                      </div>
                      <div v-for="(todo, i) in typefilter" :key=" i + '-todo2'">
                        <div
                          v-if=" value.type2 == typefilter[i]"
                          class="type click"
                          v-bind:class="typefilter[i]"
                        >{{ value.type2 }}</div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div v-if="FilterCheck == true">
            <div class="poke-wrapper">
              <div
                v-on:click="url(value.id)"
                v-for="value in filterName"
                :key="value"
                class="pokemon click"
              >
                <a>
                  <div class="pokedex-image">
                    <img :src="value.image" alt />
                  </div>
                  <div class="poke-infos capitalize">
                    <div class="pokedex-id">
                      <p v-if="value.id < 10">N°00{{ value.id }}</p>
                      <p v-else-if="value.id < 100">N°0{{ value.id }}</p>
                      <p v-else>N°{{ value.id }}</p>
                    </div>
                    <div class="pokedex-name">
                      <p>{{ value.name }}</p>
                    </div>
                    <div class="pokedex-type">
                      <div v-for="(todo, i) in typefilter" :key=" i + '-todo3'">
                        <div
                          v-if=" value.type1 == typefilter[i]"
                          class="type click"
                          v-bind:class="typefilter[i]"
                        >{{ value.type1 }}</div>
                      </div>
                      <div v-for="(todo, i) in typefilter" :key=" i + '-todo4'">
                        <div
                          v-if=" value.type2 == typefilter[i]"
                          class="type click"
                          v-bind:class="typefilter[i]"
                        >{{ value.type2 }}</div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
           <ButtonPage/>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import ProcessBar from "@/components/bar/ProcessBar";
import ButtonPage from "@/components/filtre/buttonPage";
import Search from "@/components/filtre/search";
export default {
  components: {
    ProcessBar,
    ButtonPage,
    Search
  },
  props: {

  },
  data() {
    return {
      infoPokemon: [],
      namePokemon: [],
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
        "shadow"
      ],
      filterName: [],
      FilterCheck: false,
      trie: "",
      page: "",
      filterPage: [],
      loading: true
    };
  },

  mounted: function() {
    let sleep = milliseconds => {
      return new Promise(resolve => setTimeout(resolve, milliseconds));
    };
    axios
      .get("https://pokeapi.co/api/v2/pokemon/?offset=0&limit=500")
      .then(response => {
        if (response.status != 200) {
          window.location.replace("error.php");
        }
        for (let index = 1; index < response.data.results.length; index++) {
          if (index == 116 || index == 121 || index == 132 || index == 276) {
            // pas de pokemon sur ces index dans l'api
          } else {
            axios
              .get(`https://pokeapi.co/api/v2/pokemon/${index}`)
              .then(async result => {
                await sleep(6000);
                this.loading = false;
                if (result.status != 200) {
                  window.location.replace("error.php");
                }
                axios
                  .get(`https://pokeapi.co/api/v2/pokemon-species/${index}`)
                  .then(results => {
                    if (results.status != 200) {
                      window.location.replace("error.php");
                    }
                    let pokemon;
                    if (result.data.types[1]) {
                      pokemon = {
                        id: result.data.id,
                        name: results.data.names[6].name,
                        image: result.data.sprites.front_default,
                        type1: result.data.types[0].type.name,
                        type2: result.data.types[1].type.name
                      };
                    } else {
                      pokemon = {
                        id: result.data.id,
                        name: results.data.names[6].name,
                        image: result.data.sprites.front_default,
                        type1: result.data.types[0].type.name
                      };
                    }
                    this.infoPokemon.push(pokemon);
                    this.page = window.location.href;
                    this.page = this.page.split("/");
                    this.page = this.page[this.page.length - 1];
                    this.page = Number(this.page);
                    if (this.page == 1) {
                      if (
                        index >= 22 * (this.page - 1) &&
                        index <= 22 * (this.page - 1) + 21
                      ) {
                        this.filterPage.push(pokemon);
                      }
                    } else {
                      if (
                        index >= 22 * (this.page - 1) &&
                        index <= 22 * (this.page - 1) + 20
                      ) {
                        this.filterPage.push(pokemon);
                      }
                    }
                  });
              });
          }
        }
      });
  },

  methods: {
    url(index) {
      this.$router.push(`/pokedesc/${index}`);
      window.location.reload();
    },

    trie_pokemon(liste = [], liste_destination = []) {
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
          this.FilterCheck = false;
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[i];
          }
          this.FilterCheck = true;
        } else {
          this.FilterCheck = false;
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[liste.length - 1 - i];
          }
          this.FilterCheck = true;
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
          this.FilterCheck = false;
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[i];
          }
          this.FilterCheck = true;
        } else {
          this.FilterCheck = false;
          for (let i = 0; i < liste.length; i++) {
            liste_destination[i] = liste[liste.length - 1 - i];
          }
          this.FilterCheck = true;
        }
      }
    },

    page_filter(index) {
      this.$router.push(`/pokedex/${index}`);
      window.location.reload();
    }
  }
};
</script>

<style>
a {
  text-decoration: none;
  color: #3b3b3b;
}

.pokedex-content-container {
  display: grid;
  grid-template-columns: 2fr 8fr;
  grid-column-gap: 1.5rem;
  padding: 5.5rem 1.5rem 1.5rem 0;
  margin-left: auto;
  margin-right: auto;
  max-width: 1440px;
}
.poke-container {
  background: #f6f6f6;
  border-radius: 20px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  padding: 30px;
}

.poke-wrapper {
  display: grid;
  grid-template-columns: 3fr 3fr 3fr;
  grid-template-rows: auto;
  grid-gap: 1.5rem;
  margin: 0 0 1.5rem;
}

.poke-filter-container {
  background: #f6f6f6;
  border-radius: 20px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  padding: 10px 10px;
}
.poke-logo-filter {
  padding-bottom: 10px;
}
.poke-logo-filter img {
  height: 80px;
}

input[type="text"]:focus {
  outline: none;
}
select:focus {
  outline: none;
}
button:focus {
  outline: none;
}
.poke-filter-type {
  display: grid;
  grid-template-columns: 50% 50%;
}
.type-container {
  padding: 8px 0;
}
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
.item-page {
  margin: 10px 0;
}
.item-page-button {
  height: 40px;
  /* width: 100%; */
  border-radius: 10px;
  padding: 8px;
  background: #e91d26;
  color: white;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  text-align: center;
  transition: 0.6s;
  display: flex;
  align-items: center;
}
.item-page-button img {
  height: 40px;
  width: 40px;
  padding-right: 5px;
}

.pokemon {
  border-radius: 30px;
  background: #efefef;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
}
.pokedex-image {
  background: #e7e7e7;
  border-radius: 20px 20px 0 0;
}
.pokedex-image img {
  width: 100%;
}

.poke-infos {
  padding: 2% 10% 10% 10%;
}

.pokedex-id {
  color: grey;
  padding-left: 5%;
}

.pokedex-name {
  font-size: 30px;
  color: #3b3b3b;
  padding: 8% 5%;
}

.pokedex-type {
  display: flex;
  justify-content: space-between;
}
.type {
  padding: 8px;
  background: yellow;
  text-align: center;
  border-radius: 10px;
  font-size: 15px;
  width: 110px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
}

.normal {
  background: #a7a99d;
  border: 2px solid #8f9281;
}
.grass {
  background: #79b05f;
  border: 2px solid #609348;
}
.poison {
  background: #a46a94;
  border: 2px solid #885379;
}
.psychic {
  background: #e473a1;
  border: 2px solid #dc4782;
}
.ground {
  background: #cfb063;
  border: 2px solid #c39d3c;
}
.ice {
  background: #7dc9e9;
  border: 2px solid #51b6e1;
}
.fire {
  background: #e7624f;
  border: 2px solid #e13c23;
}
.rock {
  background: #b5a66f;
  border: 2px solid #9e8e51;
}
.dragon {
  background: #827bdc;
  border: 2px solid #5a52d1;
}
.water {
  background: #4c9be8;
  border: 2px solid #1d7fe2;
}
.bug {
  background: #acb14a;
  border: 2px solid #888c3b;
}
.fighting {
  background: #aa664e;
  border: 2px solid #88523f;
}
.shadow {
  background: #7578bb;
  border: 2px solid #5458ab;
}
.flying {
  background: #6f95e3;
  border: 2px solid #4476da;
}
.electric {
  background: #e9c15e;
  border: 2px solid #e3b031;
}
.steel {
  background: #abadba;
  border: 2px solid #8f92a3;
}
.dark {
  background: #8a6b57;
  border: 2px solid #6b5343;
}
.fairy {
  background: #daa6d7;
  border: 2px solid #ca81c7;
}
.ghost {
  background: #817a8a;
  border: 2px solid #68626f;
}

.click {
  cursor: pointer;
}


</style>