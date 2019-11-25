<template>
  <section class="background">
    <p> {{filterName}} </p>
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
            <ButtonPage />
            <Search
              :FilterCheck="FilterCheck"
              :filterName="filterName"
              :infoPokemon="infoPokemon"
              v-on:changeFilterCheck="updateFilterCheck"
              v-on:fillFilterName="updateFilterName"
            />

            <Trie
              :FilterCheck="FilterCheck"
              :filterName="filterName"
              :infoPokemon="infoPokemon"
              v-on:changeFilterCheck="updateFilterCheck"
              v-on:fillFilterName="updateFilterName"
            />

            <type :FilterCheck="FilterCheck"
              :filterName="filterName"
              :infoPokemon="infoPokemon"
              v-on:changeFilterCheck="updateFilterCheck"
              v-on:fillFilterName="updateFilterName"/>

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
            <Pokedex :filterPage="filterPage" :typefilter="typefilter"/>
          </div>

          <div v-if="FilterCheck == true">
            <modeFilter :filterName="filterName" :typefilter="typefilter"/>
            <!-- <div class="poke-wrapper">
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
            </div> -->
          </div>
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
import modeFilter from "@/components/filter/modeFilter";
import Pokedex from "@/components/filter/pokedexNormal";
export default {
  components: {
    ProcessBar,
    ButtonPage,
    Search,
    Trie,
    Type,
    modeFilter,
    Pokedex
  },
  props: {},
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
    updateFilterCheck(levelFilterCheck) {
      this.FilterCheck = levelFilterCheck;
    },

    updateFilterName(levelFilterName) {
      this.filterName = levelFilterName;
    },
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
</style>