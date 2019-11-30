<template>
<!-- Component pas utlisé suite à un bug -->
<div v-if="FilterCheck == true">
  <div class="poke-wrapper">
    <div v-on:click="url(value.id)" v-for="value in filterName" :key="value.id" class="pokemon click">
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
</template>
<script>
export default {
  props: {
    filterName: Array,
    typefilter: Array
  },
  methods: {
    url(index) {
      this.$router.push(`/pokedesc/${index}`);
      window.location.reload();
    }
  }
};
</script>
<style >
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