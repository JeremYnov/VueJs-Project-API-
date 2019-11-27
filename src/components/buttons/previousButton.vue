<template>
  <div class="previous-button-wrapper">
    <a @click="PreviousPokemon()" v-if="this.id > 1" class="previous-button previous click">
      <i class="fas fa-chevron-left"></i>
      <p class="previous-text-button" v-if="this.id-1 < 10">N°00{{ this.id-1}} {{this.namePreviousPokemon}}</p>
      <p class="previous-text-button" v-else-if="this.id-1 < 100">N°0{{ this.id-1}} {{this.namePreviousPokemon}}</p>
      <p class="previous-text-button" v-else>N°{{ this.id-1}} {{this.namePreviousPokemon}}</p>
    </a>
  </div>
</template>
<script>
  import axios from "axios";
  export default {
    data() {
      return {
        id: "",
        namePreviousPokemon: ""
      };
    },
    mounted: function () {
      this.id = window.location.href;
      this.id = this.id.split("/");
      this.id = this.id[this.id.length - 1];
      this.id = Number(this.id);
      if(this.id != 1){
        axios
        .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id - 1}`)
        .then(result => {
          this.namePreviousPokemon = result.data.names[6].name;
        });
      }
      
    },

    methods: {
      PreviousPokemon() {
        this.$router.push(`/pokedesc/${this.id - 1}`);
        window.location.reload();
      },
    }
  };
</script>
<style lang="css" scoped>
  .previous-button-wrapper {
    padding-right: 25px;
  }

  .previous-button {
    height: 40px;
    width: 100%;
    border-radius: 10px;
    padding: 8px;
    background: #e91d26;
    color: white;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    transition: 0.6s;
  }

  .previous-text-button {
    width: 100%;
    font-size: 30px;
  }

  .fa-chevron-left {
    padding-right: 25px;
  }
</style>