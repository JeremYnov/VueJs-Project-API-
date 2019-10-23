<?php include("includes/header.php");
if (!isset($_GET["id"])) {
    header("location: pokedex.php");
} ?>

<section class="background">
    <div id="app" class="poke-desc-content-container">
        <div class="poke-desc-container">
            <div class="poke-desc">
                <div class="poke-image">
                    <img :src="infoPokemon.image" alt="">
                </div>
                <div class="poke-infos">
                    <div class="poke-id-name">
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

                    <div class="poke-type">
                        <div v-for="(todo, value) in typefilter">
                            <div v-if=" infoPokemon.type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon.type1 }} </div>
                            <div v-if=" infoPokemon.type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon.type2 }} </div>
                        </div>
                        <div class="poke-phys">
                            <p v-if="infoPokemon.taille < 9">Taille: 0.{{ infoPokemon.taille}} m</p>
                            <p v-else-if="infoPokemon.taille < 99">Taille: {{ infoPokemon.id}} m</p>
                            <p v-else>Taille: {{ infoPokemon.taille}} m</p>

                            <p v-if="infoPokemon.poids < 9">Poids: 0.{{ infoPokemon.poids}} kg</p>
                            <p v-else-if="infoPokemon.poids < 99">Poids: {{ infoPokemon.poids }} kg</p>
                            <p v-else>Poids: {{ infoPokemon.poids}} kg</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>



<?php require_once("includes/footer.php") ?>