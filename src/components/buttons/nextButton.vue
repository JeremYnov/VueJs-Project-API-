<template>
    <div class="next-button-wrapper">
        <a @click="NextPokemon()" v-if="this.id < 700" class="next-button next click">
            <p class="next-text-button" v-if="this.id+1 < 10">N°00{{ this.id+1}} {{this.nameNextPokemon}}</p>
            <p class="next-text-button" v-else-if="this.id+1 < 100">N°0{{ this.id+1}} {{this.nameNextPokemon}}</p>
            <p class="next-text-button" v-else>N°{{ this.id+1}} {{this.nameNextPokemon}}</p>
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                id: "",
                nameNextPokemon: "",
            };
        },
        mounted: function () {
            this.id = window.location.href;
            this.id = this.id.split("/");
            this.id = this.id[this.id.length - 1];
            this.id = Number(this.id);

            axios
                .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id + 1}`)
                .then(result => {
                    this.nameNextPokemon = result.data.names[6].name;
                });
        },

        methods: {
            NextPokemon() {
                this.$router.push(`/pokedesc/${this.id + 1}`);
                window.location.reload();
              },
        }
    };
</script>
<style lang="css" scoped>
    .next-button-wrapper {
        padding-right: 25px;
    }

    .next-button {
        height: 40px;
        width: 100%;
        text-align: right;
        border-radius: 10px;
        padding: 8px;
        background: #e91d26;
        color: white;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        transition: 0.6s;
    }

    .next-text-button {
        width: 100%;
        font-size: 30px;
        text-align: right;
    }

    .fa-chevron-right {
        padding-left: 25px;
    }
</style>