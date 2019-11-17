<template>
    <section class="background">
    <div id="app" class="poke-desc-content-container center">
        <div class="poke-desc-container">
            <div class="poke-desc-wrapper">
                <a href=""></a>
                <a href=""></a>
                <div class="poke-desc">
                    <div class="poke-image">
                        <img :src="infoPokemon.image" alt="">
                    </div>
                    <div class="poke-infos">
                        <div class="poke-id-name center">
                            <div class="poke-id">
                                <p v-if="infoPokemon.id < 10">N°00{{ infoPokemon.id}}</p>
                                <p v-else-if="infoPokemon.id < 100">N°0{{ infoPokemon.id}}</p>
                                <p v-else>N°{{ infoPokemon.id}}</p>
                            </div>
                            <div class="poke-name">
                                <p>{{ infoPokemonSpecies.name }}</p>
                            </div>
                        </div>

                        <div class="poke-description">
                            <p>{{ infoPokemonSpecies.description }}</p>
                        </div>
                        <div class="poke-type center capitalize">
                            <div class="poke-type-container">
                                <div class="poke-type-title text-center">
                                    <h2>Type</h2>
                                </div>
                                <!-- <div v-for="(todo, value) in typefilter"> -->
                                <div class="types text-center">
                                    <div v-for="(todo, value) in typefilter" :key=" value + '-todo1'">
                                        <div v-if=" infoPokemon.type1 == typefilter[value]" class="type click first-type" v-bind:class="typefilter[value]">  {{ infoPokemon.type1 }}  </div>
                                    </div>
                                    <div v-for="(todo, value) in typefilter" :key=" value + '-todo2'">
                                        <div v-if=" infoPokemon.type2 == typefilter[value]" class="type click second-type" v-bind:class="typefilter[value]"> {{ infoPokemon.type2 }} </div> 
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>

                        <div class="poke-weak-strength-wrapper">
                            <div class="poke-weakness center capitalize">
                                <div class="poke-weakness-container">
                                    <div class="poke-weakness-title text-center">
                                        <h2>Faiblesses</h2>
                                    </div>
                                    <div class="weaknesses text-center">
                                        <div v-for="todo in weaknesstable" :key="todo" class="type click" v-bind:class="todo">{{ todo }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="poke-strength center">
                                <div class="poke-strength-container">
                                    <div class="poke-strength-title text-center">
                                        <h2>Forces</h2>
                                    </div>
                                    <div class="strengths text-center">
                                        <div v-for="i in strengthtable" :key="i" class="type click capitalize" v-bind:class=i>{{ i }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="poke-categorie">
                            <p>{{ infoPokemonSpecies.categorie }}</p>
                        </div>
                        <p v-if="infoPokemon.taille <= 9">Taille: 0.{{ infoPokemon.taille }} m</p>
                        <p v-else-if="infoPokemon.taille <= 99">Taille: {{ infoPokemon.id }} m</p>
                        <p v-else>Taille: {{ infoPokemon.taille}} m</p>

                        <p v-if="infoPokemon.poids <= 9">Poids: 0.{{ infoPokemon.poids }} kg</p>
                        <p v-else-if="infoPokemon.poids <= 99">Poids: {{ infoPokemon.poids }} kg</p>
                        <p v-else>Poids: {{ infoPokemon.poids}} kg</p>


                    </div>

                </div>
                <div class="pokevolution">

                    <div class="first-evolution" v-if="typeof(firstEvolutionName.name)!='undefined'">
                        <div class="pokevolution-infos-wrapper">
                            <p v-if="firstEvolution.id < 10" class="pokevolution-id">N°00{{ firstEvolution.id}}</p>
                            <p v-else-if="firstEvolution.id < 100" class="pokevolution-id">N°0{{ firstEvolution.id}}</p>
                            <p v-else class="pokevolution-id">N°{{ firstEvolution.id}}</p>
                            <p class="pokevolution-name">{{ firstEvolutionName.name }}</p>
                        </div>
                        <div class="first evolution-image">
                            <img :src="firstEvolution.image" alt="">
                        </div>
                    </div>

                    <div class="arrow" v-if="typeof(secondEvolutionName.name)!='undefined'"><img src="assets/icons/icons8-chevron-droit-50.png" alt=""></div>

                    <div class="second-evolution" v-if="typeof(secondEvolutionName.name)!='undefined'">
                        <div class="pokevolution-infos-wrapper">
                            <p v-if="secondEvolution.id < 10" class="pokevolution-id">N°00{{ secondEvolution.id}}</p>
                            <p v-else-if="secondEvolution.id < 100" class="pokevolution-id">N°0{{ secondEvolution.id}}</p>
                            <p v-else class="pokevolution-id">N°{{ secondEvolution.id}}</p>
                            <p class="pokevolution-name">{{ secondEvolutionName.name }}</p>
                        </div>
                        <div class="second evolution-image">
                            <img :src="secondEvolution.image" alt="">
                        </div>
                    </div>

                    <div class="arrow" v-if="typeof(lastEvolutionName.name)!='undefined'"><img src="assets/icons/icons8-chevron-droit-50.png" alt=""></div>

                    <div class="last-evolution" v-if="typeof(lastEvolutionName.name)!='undefined'">
                        <div class="pokevolution-infos-wrapper">
                            <p v-if="lastEvolution.id < 10" class="pokevolution-id">N°00{{ lastEvolution.id}}</p>
                            <p v-else-if="lastEvolution.id < 100" class="pokevolution-id">N°0{{ lastEvolution.id}}</p>
                            <p v-else class="pokevolution-id">N°{{ lastEvolution.id}}</p>
                            <p class="pokevolution-name">{{ lastEvolutionName.name }}</p>
                        </div>
                        <div class="last evolution-image">
                            <img :src="lastEvolution.image" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
import axios from 'axios';

    export default {
    data() {
    return {
        moreType:"",
        moreType1:"",
        id: "",
        infoPokemon: [],
        infoPokemonSpecies: [],
        infoType: [],
        infoType2: [],
        weaknesstable: [],
        strengthtable: [],
        typefilter: ["fire", "poison", "normal", "fighting", "flying", "ground", "rock", "bug", "steel", "water", "grass", "electric", "psychic", "ice", "dragon", "dark", "fairy", "shadow","ghost"],
        urlFirstEvolution:"",
        firstEvolutionName: "",
        firstEvolution: [],
        urlSecondEvolution:"",
        secondEvolutionName: "",
        secondEvolution: [],
        urlLastEvolution:"",
        lastEvolutionName: "",
        lastEvolution: [],
        pokevolution:"",
        indextable : [],
    }
  },


    mounted: function () {
        this.id = window.location.href
        this.id = this.id.split("=")
        this.id = this.id[1]


        axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`)
            .then((result) => {
                if (result.status != 200) {
                    window.location.replace("error.php")
                }
                if (result.data.types[1]) {
                    this.infoPokemon = {
                        id: result.data.id, image: result.data.sprites.front_default,
                        type1: result.data.types[0].type.name, type2: result.data.types[1].type.name,
                        taille: result.data.height, poids: result.data.weight,
                    }
                    // AJOUTER LE 28/10/2019 A VERIFIER
                    this.moreType = result.data.types[0].type.url
                    this.moreType1 = result.data.types[1].type.url
                    axios.get(this.moreType)
                        .then((result) => {
                            if(result.status != 200){
                                window.location.replace("error.php")
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.data.damage_relations.double_damage_from[index].name);
                                // console.log(this.weaknesstable)
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.data.damage_relations.double_damage_to[index].name);
                            }
                        })
                    axios.get(this.moreType1)
                        .then((result) => {
                            if(result.status != 200){
                                window.location.replace("error.php")
                            }
                            // console.log(result)
                            for (let index = 0; index < result.data.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.data.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.data.damage_relations.double_damage_to[index].name);
                            }
                        })
                    // FIN DE LA PARTIE AJOUTEE

                } else {
                    this.infoPokemon = {
                        id: result.data.id, image: result.data.sprites.front_default,
                        type1: result.data.types[0].type.name,
                        taille: result.data.height, poids: result.data.weight,
                    }
                    // AJOUTER LE 28/10/2019 A VERIFIER
                    this.moreType = result.data.types[0].type.url
                    axios.get(this.moreType)
                        .then((result) => {
                            if(result.status != 200){
                                window.location.replace("error.php")
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.data.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.data.damage_relations.double_damage_to[index].name);
                            }
                        })
                    // FIN DE LA PARTIE AJOUTEE
                }
                axios.get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
                    .then((result) => {
                        if(result.status != 200){
                            window.location.replace("error.php")
                        }
                        for (let index = 0; index < result.data.flavor_text_entries.length; index++) {
                            if (result.data.flavor_text_entries[index].language.name == "fr") {
                                this.indextable.push(index)
                            }
                        }
                        this.infoPokemonSpecies = { name: result.data.names[6].name, description: result.data.flavor_text_entries[this.indextable[0]].flavor_text + " " + result.data.flavor_text_entries[this.indextable[1]].flavor_text + " " + result.data.flavor_text_entries[this.indextable[2]].flavor_text, categorie: result.data.genera[6].genus }

                        //AJOUTER LE 03/11/2019 A VERIFIER
                        this.pokevolution = result.data.evolution_chain.url
                        axios.get(this.pokevolution)
                            .then((result) => {
                                if(result.status != 200){
                                    window.location.replace("error.php")
                                }
                                if (typeof (result.data.chain.evolves_to[0]) == "undefined") {
                                    // console.log("UNDEFINED")
                                }
                                else {
                                    this.urlSecondEvolution = result.data.chain.evolves_to[0].species.url
                                    // console.log(this.urlSecondEvolution)
                                    axios.get(this.urlSecondEvolution)
                                        .then((result) => {
                                            if(result.status != 200){
                                                window.location.replace("error.php")
                                            }
                                            this.secondEvolutionName = { name: result.data.names[6].name }
                                            this.urlSecondEvolution = result.data.varieties[0].pokemon.url
                                            axios.get(this.urlSecondEvolution)
                                                .then((result) => {
                                                    if(result.status != 200){
                                                        window.location.replace("error.php")
                                                    }
                                                    this.secondEvolution = { id: result.data.id, image: result.data.sprites.front_default }
                                                })
                                        })
                                    if (typeof (result.data.chain.evolves_to[0].evolves_to[0]) == "undefined") {
                                        // console.log("UNDEFINED")
                                    }
                                    else {
                                        this.urlLastEvolution = result.data.chain.evolves_to[0].evolves_to[0].species.url
                                        // console.log(this.urlLastEvolution)
                                        axios.get(this.urlLastEvolution)
                                            .then((result) => {
                                                if(result.status != 200){
                                                    window.location.replace("error.php")
                                                }
                                                this.lastEvolutionName = { name: result.data.names[6].name }
                                                this.urlLastEvolution = result.data.varieties[0].pokemon.url
                                                axios.get(this.urlLastEvolution)
                                                    .then((result) => {
                                                        if(result.status != 200){
                                                            window.location.replace("error.php")
                                                        }
                                                        this.lastEvolution = { id: result.data.id, image: result.data.sprites.front_default }
                                                    })
                                            })
                                    }
                                }

                                this.urlFirstEvolution = result.data.chain.species.url
                                axios.get(this.urlFirstEvolution)
                                    .then((result) => {
                                        if(result.status != 200){
                                            window.location.replace("error.php")
                                        }
                                        this.firstEvolutionName = { name: result.data.names[6].name }
                                        this.urlFirstEvolution = result.data.varieties[0].pokemon.url
                                        axios.get(this.urlFirstEvolution)
                                            .then((result) => {
                                                if(result.status != 200){
                                                    window.location.replace("error.php")
                                                }
                                                this.firstEvolution = { id: result.data.id, image: result.data.sprites.front_default }
                                            })
                                    })
                            })
                        //FIN DE LA PARTIE AJOUTEE
                    })
            })
    },
    }

</script>
<style>
.poke-desc-container{
    padding: 5.5rem 1.5rem 0 0;
    max-width: 70%;
}
.poke-desc-wrapper{
    background: #f6f6f6;
    border-radius: 20px;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
    padding: 30px;
}
.poke-desc{
    display: grid;
    grid-template-columns: 4fr 6fr;
    grid-column-gap: 1.5rem;
}
.poke-image{
    background: #e7e7e7;
    border-radius: 20px;
    display: flex;
    align-items: center;
}
.poke-image img{
    width: 100%;
    background: #e7e7e7;
    border-radius: 20px;
}
.poke-id-name{
    padding-bottom: 5%;
}
.poke-id{
    color: grey;
    font-size: 30px;
    padding-right: 10px;
}
.poke-name{
    color: #3b3b3b;
    font-size: 30px;
}
.poke-description{
    font-size: 18px;
    text-align: justify;
}

.poke-type-container{
    padding-bottom: 10px;
}
.first-type{
    margin-right: 0.5rem;
}
.poke-weak-strength-wrapper{
    display: grid;
    grid-template-columns: 5fr 5fr;
    grid-column-gap: 1.5rem;
}
.weaknesses,.strengths{
    display: grid;
    grid-template-columns: 5fr 5fr;
    grid-gap: 0.5rem;
}
.types{
    display: flex;
}
.type{
    padding: 8px;
    border-radius: 10px;
    font-size: 15px;
    width: 110px;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5)
}
.normal{background:#a7a99d ;}
.grass{background: #79b05f;}
.poison{background:#a46a94;}
.psychic{background:#e473a1;}
.ground{background:#cfb063;}
.ice{background:#7dc9e9;}
.fire{background:#e7624f;}
.rock{background:#b5a66f;}
.dragon{background:#827bdc;}
.water{background:#4c9be8;}
.bug{background:#acb14a;}
.fighting{background:#aa664e;}
.shadow{background:#7578bb;}
.flying{background:#6f95e3;}
.electric{background:#e9c15e;}
.steel{background:#abadba;}
.dark{background:#8a6b57;}
.fairy{background:#daa6d7;}
.ghost{background:#817a8a;}


.pokevolution{
    display: flex;
    justify-content: space-around;
    margin: 30px 0;
    padding: 50px 0;
    background: #e7e7e7;
    border-radius: 20px;
}
.pokevolution-infos-wrapper{
    display: flex;
    justify-content: center;
    padding-bottom: 15px;
}
.pokevolution-id{
    padding-right: 7px;
}
.evolution-image img{
    width: 200px;
    border-top: 1px solid #d4d4d4;
}
.first-evolution,.second-evolution,.last-evolution{
    background: #f6f6f6;
    border-radius: 20px;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
    padding: 20px;
}
.arrow{
    display: flex;
    align-items: center;
}


</style>