<template>
    <div class="next-button-wrapper">
        <!--Le bouton lance la fonction NextPokemon qui réccupère l'id su prochain pokémon pour afficher sa page -->
        <a @click="NextPokemon()" v-if="this.id < 700" class="next-button next click">
            <!-- Nous ajoutons N° et des 0 pour le style en fonction de l'id -->
            <p class="next-text-button" v-if="this.id+1 < 10">N°00{{ this.id+1}} {{this.nameNextPokemon}}</p>
            <p class="next-text-button" v-else-if="this.id+1 < 100">N°0{{ this.id+1}} {{this.nameNextPokemon}}</p>
            <p class="next-text-button" v-else>N°{{ this.id+1}} {{this.nameNextPokemon}}</p>
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</template>
<script>
//Import de la librairie axios pour consommer l'API 
    import axios from 'axios';
    export default {
        data() {
            return {
                id: "", //Variable qui stock l'id du pokémon et qui nous permet de réccupérer les infos du pokémon avec le axios.get
                nameNextPokemon: "", //Variable qui stock le nom du prochain pokémon
            };
        },
        mounted: function () {
            //Réccupération  et stockage de l'url dans la variable id 
            this.id = window.location.href;
            // On split l'url au / pour ne réccupérer que l'id
            this.id = this.id.split("/");
            this.id = this.id[this.id.length - 1];
            this.id = Number(this.id);

            //Requête axios nous permettant de réccupérer le nom en francais du prochain pokémon 
            axios
                .get(`https://pokeapi.co/api/v2/pokemon-species/${this.id + 1}`) //On fait +1 a l'id pour réccupérer les infos du prohain pokémon
                .then(result => {
                    //On stock le nom du prochain pokémon dans la variable nameNextPokémon
                    this.nameNextPokemon = result.data.names[6].name;
                });
        },

        methods: {
            //Cette méthode permet qu'au @click l'url change pour en ajoutant +1 a l'id afin d'afficher la page du prochain pokemon 
            NextPokemon() {
                this.$router.push(`/pokedesc/${this.id + 1}`); //Permet de changer l'url en ajoutant +1 à l'id
                
                window.location.reload(); //Permet de raffraichir la page
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