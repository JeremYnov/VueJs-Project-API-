<template>
  <a @click="LastEvolution()" class="click">
    <div class="last-evolution" v-if="typeof(lastEvolutionName.name)!='undefined'">
      <div class="pokevolution-infos-wrapper">
        <p v-if="lastEvolution.id < 10" class="pokevolution-id">N°00{{ lastEvolution.id}}</p>
        <p v-else-if="lastEvolution.id < 100" class="pokevolution-id">N°0{{ lastEvolution.id}}</p>
        <p v-else class="pokevolution-id">N°{{ lastEvolution.id}}</p>
        <p class="pokevolution-name">{{ lastEvolutionName.name }}</p>
      </div>
      <div class="last evolution-image">
        <img :src="lastEvolution.image" alt />
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
      urlLastEvolution: "",
      lastEvolutionName: "",
      lastEvolution: [],
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
            if (
              typeof result.data.chain.evolves_to[0].evolves_to[0] ==
              "undefined"
            ) {
              // console.log("UNDEFINED")
            } else {
              this.urlLastEvolution =
                result.data.chain.evolves_to[0].evolves_to[0].species.url;
              // console.log(this.urlLastEvolution)
              axios.get(this.urlLastEvolution).then(result => {
                if (result.status != 200) {
                  window.location.replace("error.php");
                }
                this.lastEvolutionName = { name: result.data.names[6].name };
                this.urlLastEvolution = result.data.varieties[0].pokemon.url;
                axios.get(this.urlLastEvolution).then(result => {
                  if (result.status != 200) {
                    window.location.replace("error.php");
                  }
                  this.lastEvolution = {
                    id: result.data.id,
                    image: result.data.sprites.front_default
                  };
                });
              });
            }
          }
        });
      });
  },

  methods: {
      LastEvolution() {
        this.$router.push(`/pokedesc/${this.lastEvolution.id}`);
        window.location.reload();
      },
  }
};
</script>

<style lang="css" scoped>
.last-evolution {
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