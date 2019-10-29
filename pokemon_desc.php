<?php include("includes/header.php");
if (!isset($_GET["id"])) {
    header("location: pokedex.php");
} ?>

<section class="background">
    <div id="app" class="poke-desc-content-container center">
        <div class="poke-desc-container">
            <div class="poke-desc">
                <div class="poke-image">
                    <img :src="infoPokemon.image" alt="">
                </div>
                <div class="poke-infos">
                    <div class="poke-id-name center">
                        <div class="poke-id">
                            <p v-if="infoPokemon.id < 9">N°00{{ infoPokemon.id}}</p>
                            <p v-else-if="infoPokemon.id < 99">N°0{{ infoPokemon.id}}</p>
                            <p v-else>N°{{ infoPokemon.id}}</p>
                        </div>
                        <div class="poke-name">
                            <p>{{ infoPokemonSpecies.name }}</p>
                        </div>
                    </div>

                    <div class="poke-description">
                        <p>{{ infoPokemonSpecies.description }}</p>
                    </div>
                    <div class="poke-categorie">
                        <p>{{ infoPokemonSpecies.categorie }}</p>
                    </div>

                    <div class="poke-type center capitalize">
                        <div class="poke-type-container">
                            <div class="poke-type-title text-center">
                                <h2>Type</h2>
                            </div>
                            <!-- <div v-for="(todo, value) in typefilter"> -->
                            <div class="types">
                                <div v-for="(todo, value) in typefilter" v-if=" infoPokemon.type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon.type1 }} </div>
                                <div v-for="(todo, value) in typefilter" v-if=" infoPokemon.type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon.type2 }} </div>
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
                                    <div v-for="todo in weaknesstable" class="type click" v-bind:class=todo>{{ todo }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="poke-strength center">
                            <div class="poke-strength-container">
                                <div class="poke-strength-title text-center">
                                    <h2>Forces</h2>
                                </div>
                                <div class="strengths text-center">
                                    <div v-for="i in strengthtable" class="type click capitalize" v-bind:class=i>{{ i }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p v-if="infoPokemon.taille <= 9">Taille: 0.{{ infoPokemon.taille }} m</p>
                    <p v-else-if="infoPokemon.taille <= 99">Taille: {{ infoPokemon.id }} m</p>
                    <p v-else>Taille: {{ infoPokemon.taille}} m</p>

                    <p v-if="infoPokemon.poids <= 9">Poids: 0.{{ infoPokemon.poids }} kg</p>
                    <p v-else-if="infoPokemon.poids <= 99">Poids: {{ infoPokemon.poids }} kg</p>
                    <p v-else>Poids: {{ infoPokemon.poids}} kg</p>


                </div>

            </div>
        </div>

    </div>
</section>



<?php require_once("includes/footer.php") ?>