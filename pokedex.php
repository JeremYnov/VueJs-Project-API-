<?php include("includes/header.php");

?>
<section class="background">
    <div id="pokedex">
        <div class="pokedex-content-container">
            <div id="filter" class="poke-filter">
                <div class="poke-filter-container">
                    <div class="searchbar">
                        <input type="text" v-model="name" placeholder="Rechercher..." class="poke-searchbar">
                        <button v-on:click="filter(100000000000)" class="searchbar-button click"><img src="assets/icons/icons8-chercher-40.png" alt=""></button>
                    </div>

                    <p v-if="FilterCheck == false">Aucun Pokémon selectionné (ne pas oublier la majuscule pour la premiere lettre)</p>
                    <button v-on:click="pokedex()" v-else>Afficher le pokedex entier</button>

                    <select name="" id="">
                        <option value="">Ordre Alphabétique A-Z</option>
                        <option value="">Ordre Alphabétique Z-A</option>
                        <option value="" selected>Numéro le plus bas en premier</option>
                        <option value="">Numéro le plus haut en premier</option>
                    </select>

                    <div class="poke-filter-type">
                        <div v-for="(todo, index) in typefilter" class="type-container">
                            <div v-on:click="filter(index)" class="type click" v-bind:class="typefilter[index]"> {{ typefilter[index] }} </div>
                        </div>

                    </div>


                </div>

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

                                        <div v-for="(todo, value) in typefilter" v-if=" infoPokemon[index].type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon[index].type1 }} </div>
                                        <div v-for="(todo, value) in typefilter" v-if=" infoPokemon[index].type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon[index].type2 }} </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div v-if="FilterCheck == true">
                    <div class="poke-wrapper">
                        <div v-on:click="url(filterName[index].id)" v-for="(todo, index) in filterName" class="pokemon">
                            <a v-bind:href="urlPokemon">
                                <div class="poke-image">
                                    <img :src="filterName[index].image" alt="">
                                </div>
                                <div class="poke-infos">
                                    <div class="poke-id">
                                        <p v-if="filterName[index].id < 9">N°00{{ filterName[index].id }}</p>
                                        <p v-else-if="filterName[index].id < 99">N°0{{ filterName[index].id }}</p>
                                        <p v-else>N°{{ filterName[index].id }}</p>
                                    </div>
                                    <div class="poke-name">
                                        <p>{{ filterName[index].name }}</p>
                                    </div>
                                    <div class="poke-type">
                                        <div v-for="(todo, value) in typefilter">
                                            <div v-if=" filterName[index].type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ filterName[index].type1 }} </div>
                                            <div v-if=" filterName[index].type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ filterName[index].type2 }} </div>
                                        </div>
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