<template>
  <section class="background">
    <!-- <p> {{filterName}} </p> -->
    <!-- si loading == true la bar de chargement est actif -->
    <div v-if="loading == true">
      <!-- ProcessBAr => bar de chargement -->
      <ProcessBar />
    </div>
    <div v-else id="pokedex">
      <div class="pokedex-content-container">
        <div id="filter" class="poke-filter">
          <div class="poke-filter-container">
            <div class="poke-logo-filter center">
              <img src="../../assets/icons/icon-pokeball.png" alt />
            </div>
            <!-- ButtonPage => naviguation dans les differentes pages du pokedex -->
            <ButtonPage />

            <!-- Search => barre de recherche -->
            <Search
              :FilterCheck="FilterCheck"
              :filterName="filterName"
              :infoPokemon="infoPokemon"
              v-on:changeFilterCheck="updateFilterCheck"
              v-on:fillFilterName="updateFilterName"
            />
            <!-- Trie => choix entre 4 filtres de trie(ordre alphabetique,ordre par id, etc) -->
            <Trie
              :FilterCheck="FilterCheck"
              :filterName="filterName"
              :infoPokemon="infoPokemon"
              v-on:changeFilterCheck="updateFilterCheck"
              v-on:fillFilterName="updateFilterName"
            />
            <!-- type => filtre par type -->
            <type
              :FilterCheck="FilterCheck"
              :filterName="filterName"
              :infoPokemon="infoPokemon"
              v-on:changeFilterCheck="updateFilterCheck"
              v-on:fillFilterName="updateFilterName"
            />

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
          <!-- si FilterCheck == false => on affiche le pokedex normal avec 21 pokemons par page -->
          <div v-if="FilterCheck == false">
            <!-- Pokedex => pokedex normal avec 21 pokemons par page -->
            <Pokedex :filterPage="filterPage" :typefilter="typefilter" />
          </div>
          <!-- si FilterCheck == true => on affiche le pokedex en mode filtre avec tout les pokemons et non 21 -->
          <div v-if="FilterCheck == true">
            <!-- <modeFilter :filterName="filterName" :typefilter="typefilter"/> -->
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
          <!-- ButtonPage => naviguation dans les differentes pages du pokedex -->
          <ButtonPage />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import ProcessBar from "@/components/bar/ProcessBar";
import ButtonPage from "@/components/filter/buttonPage";
import Search from "@/components/filter/searchBar";
import Trie from "@/components/filter/triePoke";
import Type from "@/components/filter/typePoke";
// import modeFilter from "@/components/filter/modeFilter";
import Pokedex from "@/components/filter/pokedexNormal";
export default {
  components: {
    ProcessBar,
    ButtonPage,
    Search,
    Trie,
    Type,
    // modeFilter,
    Pokedex
  },
  props: {},
  data() {
    return {
      // infoPokemon => stocke tout les pokemons pour faire des filtres
      infoPokemon: [],
      // typefilter => stocke les differents type pour afficher les couleurs par type
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
      // filterName => stocke les pokemons filtré
      filterName: [],
      // FilterCheck => permet de dire si on est en mode filtre ou non
      FilterCheck: false,
      // page => permet de recuperer le numero de la page dans le get
      page: "",
      // filterPage => stocke 21 pokemons par rapport à la page
      filterPage: [],
      // loading >= si loading = true alors la page chargement s'affiche 
      loading: true
    };
  },

  mounted: function() {
    // sleep => fonction qui permet d'attendre avant de passer à la prochaine ligne
    let sleep = milliseconds => {
      return new Promise(resolve => setTimeout(resolve, milliseconds));
    };
    axios
      .get("https://pokeapi.co/api/v2/pokemon/?offset=0&limit=500")
      .then(response => {
        for (let index = 1; index < response.data.results.length; index++) {
          if (index == 116 || index == 121 || index == 132 || index == 276) {
            // pas de pokemon sur ces index dans l'api
          } else {
            axios
              .get(`https://pokeapi.co/api/v2/pokemon/${index}`)
              .then(async result => {
                await sleep(6000);
                // apres 6 secondes de chargement loading passer en false et le pokedex peut s'afficher
                this.loading = false;
                axios
                  .get(`https://pokeapi.co/api/v2/pokemon-species/${index}`)
                  .then(results => {
                    let pokemon;
                    // on verifie si le pokemon possede 1 ou 2 types
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
                    // on ajoute les infos de tout les pokemons dans infopokemon
                    this.infoPokemon.push(pokemon);
                    // on recupére le numero de la page grace au get
                    this.page = window.location.href;
                    this.page = this.page.split("/");
                    this.page = this.page[this.page.length - 1];
                    this.page = Number(this.page);
                    // algo pour choisir les 21 pokemons qui s'affiche par rapport au numero de la page
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
    // permet de recuperer l'element enfant pour changer la valeur de FilterCheck
    updateFilterCheck(levelFilterCheck) {
      this.FilterCheck = levelFilterCheck;
    },
    // permet de recuperer l'element enfant pour changer la valeur de filterName
    updateFilterName(levelFilterName) {
      this.filterName = levelFilterName;
    },
    // url => quand on clique sur un pokemon ça renois sur une autre page 
    // qui affichera sa description à l'aide de son id qu'on met dans le get
    url(index) {
      this.$router.push(`/pokedesc/${index}`);
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
.click {
  cursor: pointer;
}

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