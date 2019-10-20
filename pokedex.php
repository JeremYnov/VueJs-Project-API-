<?php include("includes/header.php");

?>
    <section class="background">
        <div class="pokedex-content-container">
            <div id="filter" class="poke-filter"></div>
            <div id="primary" class="poke-container">
                <div class="poke-wrapper">
                    <div v-on:click="url(infoPokemon[index].id)" v-for="(todo, index) in infoPokemon" class="pokemon">
                    <a v-bind:href="urlPokemon">
                        <div class="poke-image">
                            <img :src="infoPokemon[index].image" alt="">
                        </div>
                        <div class="poke-infos">
                            <div class="poke-id">
                                <p v-if="index < 9">N°00{{ index + 1}}</p>
                                <p v-else-if="index < 99">N°0{{ index + 1}}</p>
                                <p v-else>N°{{ index + 1}}</p>
                            </div>
                            <div class="poke-name">
                                <p>{{ namePokemon[index] }}</p>
                            </div>
                            <div class="poke-type">
                                <div v-if=" infoPokemon[index].type1 == 'fire'" class="type fire">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'poison'" class="type poison">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'normal'" class="type normal">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'fighting'" class="type fighting">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'flying'" class="type flying">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'ground'" class="type ground">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'rock'" class="type rock">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'bug'" class="type bug">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'ghost'" class="type ghost">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'steel'" class="type steel">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'water'" class="type water">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'grass'" class="type grass">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'electric'" class="type electric">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'psychic'" class="type psychic">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'ice'" class="type ice">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'dragon'" class="type dragon">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'dark'" class="type dark">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'fairy'" class="type fairy">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'unknown'" class="type unknown">{{ infoPokemon[index].type1 }}</div>
                                <div v-else-if="infoPokemon[index].type1 == 'shadow'" class="type shadow">{{ infoPokemon[index].type1 }}</div>

                                <div v-if=" infoPokemon[index].type2 == 'fire'" class="type fire">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'poison'" class="type poison">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'normal'" class="type normal">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'fighting'" class="type fighting">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'flying'" class="type flying">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'ground'" class="type ground">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'rock'" class="type rock">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'bug'" class="type bug">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'ghost'" class="type ghost">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'steel'" class="type steel">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'water'" class="type water">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'grass'" class="type grass">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'electric'" class="type electric">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'psychic'" class="type psychic">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'ice'" class="type ice">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'dragon'" class="type dragon">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'dark'" class="type dark">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'fairy'" class="type fairy">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'unknown'" class="type unknown">{{ infoPokemon[index].type2 }}</div>
                                <div v-else-if="infoPokemon[index].type2 == 'shadow'" class="type shadow">{{ infoPokemon[index].type2 }}</div>
                            </div>
                        </div>
                        </a>
                    </div>      
                </div>
            </div>
        </div>
    </section>

    <?php require_once("includes/footer.php") ?>