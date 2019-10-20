<?php include("includes/header.php");

?>
<section class="background">
    <div id="pokedex">
        <div class="pokedex-content-container">
            <div id="filter" class="poke-filter">
                <input type="text" v-model="name">
                <button v-on:click="filter()">Valider</button>
            </div>
            <div class="poke-container">

                <div v-if="FilterCheck == false">
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

                <div v-if="FilterCheck == true">
                    <div class="poke-wrapper">
                        <div v-on:click="url(filterName.id)" class="pokemon">
                            <a v-bind:href="urlPokemon">
                                <div class="poke-image">
                                    <img :src="filterName.image" alt="">
                                </div>
                                <div class="poke-infos">
                                    <div class="poke-id">
                                        <p v-if="filterName.id < 9">N°00{{ filterName.id }}</p>
                                        <p v-else-if="filterName.id < 99">N°0{{ filterName.id }}</p>
                                        <p v-else>N°{{ filterName.id }}</p>
                                    </div>
                                    <div class="poke-name">
                                        <p>{{ filterName.name }}</p>
                                    </div>
                                    <div class="poke-type">
                                        <div v-if=" filterName.type1 == 'fire'" class="type fire">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'poison'" class="type poison">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'normal'" class="type normal">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'fighting'" class="type fighting">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'flying'" class="type flying">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'ground'" class="type ground">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'rock'" class="type rock">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'bug'" class="type bug">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'ghost'" class="type ghost">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'steel'" class="type steel">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'water'" class="type water">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'grass'" class="type grass">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'electric'" class="type electric">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'psychic'" class="type psychic">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'ice'" class="type ice">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'dragon'" class="type dragon">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'dark'" class="type dark">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'fairy'" class="type fairy">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'unknown'" class="type unknown">{{ filterName.type1 }}</div>
                                        <div v-else-if="filterName.type1 == 'shadow'" class="type shadow">{{ filterName.type1 }}</div>

                                        <div v-if=" filterName.type2 == 'fire'" class="type fire">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'poison'" class="type poison">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'normal'" class="type normal">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'fighting'" class="type fighting">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'flying'" class="type flying">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'ground'" class="type ground">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'rock'" class="type rock">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'bug'" class="type bug">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'ghost'" class="type ghost">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'steel'" class="type steel">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'water'" class="type water">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'grass'" class="type grass">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'electric'" class="type electric">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'psychic'" class="type psychic">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'ice'" class="type ice">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'dragon'" class="type dragon">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'dark'" class="type dark">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'fairy'" class="type fairy">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'unknown'" class="type unknown">{{ filterName.type2 }}</div>
                                        <div v-else-if="filterName.type2 == 'shadow'" class="type shadow">{{ filterName.type2 }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php require_once("includes/footer.php") ?>