<template>
  <section class="background">
    <div v-if="loading == true">
      <ProcessBar />
    </div>
    <div v-else id="item">
      <div class="item-content-container">
        <div id="filter" class="item-filter">
          <div class="item-filter-container">
            <div class="item-logo-filter">
              <img src="assets/icons/icon-pokeball.png" alt />
            </div>
            <div class="item-page">
              <router-link to="/pokedex/1">
                <a>
                  <img src="assets/icons/icons8-pokédex-50.png" alt />Pokédex
                </a>
              </router-link>
            </div>
          </div>
        </div>

        <div class="item-container">
          <!-- <div v-if="FilterCheck == false"> -->
          <div class="item-wrapper">
            <div
              v-on:click="url(value.id)"
              v-for="(value, index) in infoItem"
              :key="index"
              class="item"
            >
              <div class="item-image">
                <img :src="value.image" alt />
              </div>
              <div class="item-infos">
                <div class="item-id">
                  <p v-if="index < 9">N°00{{ index + 1}}</p>
                  <p v-else-if="index < 99">N°0{{ index + 1}}</p>
                  <p v-else>N°{{ index + 1}}</p>
                </div>
                <div class="item-name">
                  <p>{{ value.name }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import ProcessBar from "@/components/bar/ProcessBar";
export default {
  data() {
    return {
      infoItem: [],
      loading: true
    };
  },
   components: {
    ProcessBar,
  },

  mounted: function() {
    let sleep = milliseconds => {
      return new Promise(resolve => setTimeout(resolve, milliseconds));
    };
    axios
      .get("https://pokeapi.co/api/v2/item/?offset=0&limit=200")
      .then(json => {
        if (json.status != 200) {
          window.location.replace("error.php");
        }
        for (let index = 1; index < json.data.results.length; index++) {
          // console.log("l'index est: " + index)
          axios.get(`https://pokeapi.co/api/v2/item/${index}`).then(async result => {
            await sleep(6000);
                this.loading = false;
            if (result.status != 200) {
              window.location.replace("error.php");
            }
            // console.log("l'index est: " + index)
            // console.log("l'id est: " + result.id)
            let item = {
              id: result.data.id,
              image: result.data.sprites.default,
              name: result.data.names[6].name,
              description: result.data.flavor_text_entries[6].text
            };
            // this.infoPokemon[result.id] = pokemon
            this.infoItem.push(item);
          });
        }
      });
  }
};
</script>

   
<style>
body {
  font-family: "Righteous", cursive;
}

a {
  text-decoration: none;
  color: #3b3b3b;
}

.item-content-container {
  display: grid;
  grid-template-columns: 2fr 8fr;
  grid-column-gap: 1.5rem;
  padding: 5.5rem 1.5rem 0 0;
  margin-left: auto;
  margin-right: auto;
  max-width: 1440px;
}
.item-container {
  background: #f6f6f6;
  border-radius: 20px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  padding: 30px;
}

.item-wrapper {
  display: grid;
  /* grid-template-columns: 2fr 2fr 2fr 2fr 2fr; */
  grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
  grid-template-rows: auto;
  grid-gap: 1.5rem;
  margin: 0 0 1.5rem;
}

.item-filter-container {
  background: #f6f6f6;
  border-radius: 20px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  padding: 10px 10px;
}
.item-logo-filter {
  display: flex;
  justify-content: center;
  padding-bottom: 10px;
}
.item-logo-filter img {
  height: 90px;
}

.item {
  border-radius: 30px;
  background: #efefef;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
}
.item-image {
  background: #e7e7e7;
  border-radius: 20px 20px 0 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
.item-image img {
  width: 100px;
}
.item-infos {
  padding: 2% 10% 10% 10%;
}
.item-id {
  font-size: 14px;
  color: grey;
  padding-left: 5%;
}
.item-name {
  font-size: 18px;
  color: #3b3b3b;
  padding: 8% 5%;
}

.click {
  cursor: pointer;
}

.item-itemdex:hover {
  background: #e91d26;
  color: white;
}

.item-page {
  margin: 10px 0;
  display: flex;
  justify-content: center;
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
</style>