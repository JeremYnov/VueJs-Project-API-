<template>
    <a @click="SecondEvolution()" class="click">
    <div class="second-evolution" v-if="typeof(secondEvolutionName.name)!='undefined'">
      <div class="pokevolution-infos-wrapper">
        <p v-if="secondEvolution.id < 10" class="pokevolution-id">N°00{{ secondEvolution.id}}</p>
        <p v-else-if="secondEvolution.id < 100" class="pokevolution-id">N°0{{ secondEvolution.id}}</p>
        <p v-else class="pokevolution-id">N°{{ secondEvolution.id}}</p>
        <p class="pokevolution-name">{{ secondEvolutionName.name }}</p>
      </div>
      <div class="second evolution-image">
        <img :src="secondEvolution.image" alt />
      </div>
    </div>
  </a>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      pokevolution: "",
      urlSecondEvolution: "",
      secondEvolutionName: "",
      secondEvolution: [],
      id: ""
    };
  },
  mounted: function() {
    this.id = window.location.href;
    this.id = this.id.split("/");
    this.id = this.id[this.id.length - 1];
    this.id = Number(this.id);

    axios
      .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
      .then(result => {
        if (result.status != 200) {
          window.location.replace("error.php");
        }
        this.pokevolution = result.data.evolution_chain.url;
        axios.get(this.pokevolution).then(result => {
          if (result.status != 200) {
            window.location.replace("error.php");
          }

          if (typeof result.data.chain.evolves_to[0] == "undefined") {
            // console.log("UNDEFINED")
          } else {
            this.urlSecondEvolution =
              result.data.chain.evolves_to[0].species.url;
            // console.log(this.urlSecondEvolution)
            axios.get(this.urlSecondEvolution).then(result => {
              if (result.status != 200) {
                window.location.replace("error.php");
              }
              this.secondEvolutionName = { name: result.data.names[6].name };
              this.urlSecondEvolution = result.data.varieties[0].pokemon.url;
              axios.get(this.urlSecondEvolution).then(result => {
                if (result.status != 200) {
                  window.location.replace("error.php");
                }
                this.secondEvolution = {
                  id: result.data.id,
                  image: result.data.sprites.front_default
                };
              });
            });
          }
        });
      });
  },

  methods: {
    SecondEvolution() {
      this.$router.push(`/pokedesc/${this.secondEvolution.id}`);
      window.location.reload();
    }
  }
};
</script>

<style lang="css" scoped>
.second-evolution {
  background: #f6f6f6;
  border-radius: 20px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
  padding: 20px;
}
.arrow {
    display: flex;
    align-items: center;
  }
  .pokevolution-infos-wrapper {
    display: flex;
    justify-content: center;
    padding-bottom: 15px;
  }
  .pokevolution-id {
    padding-right: 7px;
  }
  .evolution-image img {
    width: 200px;
    border-top: 1px solid #d4d4d4;
  }
</style>