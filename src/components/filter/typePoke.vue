<template>
  <div class="poke-filter-type capitalize">
    <div v-for="(todo, index) in typefilter" :key="todo[index]" class="type-container center">
      <div
        v-on:click="filtertype(index)"
        class="type click"
        v-bind:class="typefilter[index]"
      >{{ typefilter[index] }}</div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
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
    };
  },
  props: {
    infoPokemon: Array,
    FilterCheck: Boolean,
    filterName: Array
  },

  methods: {
    filtertype(i) {
      let filterNameCompo = [];
      let validate = 0;
      let info;
      for (let index = 0; index < this.infoPokemon.length; index++) {
        if (
          this.infoPokemon[index].type1 == this.typefilter[i] ||
          this.infoPokemon[index].type2 == this.typefilter[i]
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
          this.$emit("fillFilterName", filterNameCompo);
        }
      }
      if (validate == 0) {
        this.$emit("changeFilterCheck", false);
      }
    }
  }
};
</script>


<style>
.poke-filter-type {
  display: grid;
  grid-template-columns: 50% 50%;
}

.type-container {
  padding: 8px 0;
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