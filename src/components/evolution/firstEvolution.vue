<template>
  <a @click="FirstEvolution()" class="click">
    <div class="first-evolution" v-if="typeof(firstEvolutionName.name)!='undefined'">
      <div class="pokevolution-infos-wrapper">
        <p v-if="firstEvolution.id < 10" class="pokevolution-id">N°00{{ firstEvolution.id}}</p>
        <p v-else-if="firstEvolution.id < 100" class="pokevolution-id">N°0{{ firstEvolution.id}}</p>
        <p v-else class="pokevolution-id">N°{{ firstEvolution.id}}</p>
        <p class="pokevolution-name">{{ firstEvolutionName.name }}</p>
      </div>
      <div class="first evolution-image">
        <img :src="firstEvolution.image" alt />
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
      urlFirstEvolution: "",
      firstEvolutionName: "",
      firstEvolution: [],
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

          this.urlFirstEvolution = result.data.chain.species.url;
          axios.get(this.urlFirstEvolution).then(result => {
            if (result.status != 200) {
              window.location.replace("error.php");
            }
            this.firstEvolutionName = { name: result.data.names[6].name };
            this.urlFirstEvolution = result.data.varieties[0].pokemon.url;
            axios.get(this.urlFirstEvolution).then(result => {
              if (result.status != 200) {
                window.location.replace("error.php");
              }
              this.firstEvolution = {
                id: result.data.id,
                image: result.data.sprites.front_default
              };
            });
          });
        });
      });
  },

  methods: {
    FirstEvolution() {
      this.$router.push(`/pokedesc/${this.firstEvolution.id}`);
      window.location.reload();
    }
  }
};
</script>

<style lang="css" scoped>
.first-evolution {
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