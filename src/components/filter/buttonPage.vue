<template>
<!-- affichage des pages avec 5 numero de pages qui s'affiche -->
  <div class="page-container" v-if="page < 4">
    <button class="page click" v-for="n in 5" :key=" n + '-button1'" @click="page_filter(n)">{{ n }}</button>
  </div>
  <div class="page-container" v-else>
    <div v-for="nb in (page + 2)" :key=" nb + '-button2'">
      <button class="page click" v-if="nb >= (page - 2)" v-on:click="page_filter(nb)">{{ nb }}</button>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      page: ""
    };
  },
  mounted: function() {
    // page => recupere le numero de la page dans le get
    this.page = window.location.href;
    this.page = this.page.split("/");
    this.page = this.page[this.page.length - 1];
    this.page = Number(this.page);
  },

  methods: {
    // si on clique sur un numero de page ça renvois ce numero en get et donc ça change les 21 pokemons 
    page_filter(index) {
      this.$router.push(`/pokedex/${index}`);
      window.location.reload();
    }
  }
};
</script>


<style>
.page-container {
  display: flex;
  justify-content: center;
}

.page {
  cursor: pointer;
  margin: 10px;
  padding: 8px;
  border: 3px solid red;
  border-radius: 15%;
  background: none;
  text-align: center;
  transition: 0.5s;
}

.page:hover {
  color: white;
  background: red;
}

.click {
  cursor: pointer;
}
</style>