<?php include("includes/header.php");

?>
<section class="background">
    <div id="pokedex">
        <div class="pokedex-content-container">
            <div id="filter" class="poke-filter">
                <div class="poke-filter-container">
                    <div class="searchbar">
                        <input type="text" v-model="name" placeholder="Rechercher..." class="poke-searchbar">
                        <button v-on:click="filter()" class="searchbar-button click"><i class="fas fa-search"></i></button>
                    </div>

                    <p v-if="FilterCheck == false">Aucun Pokémon selectionné (ne pas oublier la majuscule pour la première lettre)</p>
                    <button v-on:click="pokedex()" v-else>Afficher le pokedex entier</button>

                    <button class="click">A->Z</button>
                    <button class="click">Z->A</button>
                    <button class="click">1-></button>
                    <button class="click"><-1</button> 
                <div class="type fire click">fire</div>
                <div class="type poison click">poison</div>
                <div class="type normal click">normal</div>
                <div class="type fighting click">fighting</div>
                <div class="type flying click">flying</div>
                <div class="type ground click">ground</div>
                <div class="type rock click">rock</div>
                <div class="type bug click">bug</div>
                <div class="type ghost click">ghost</div>
                <div class="type steel click">steel</div>
                <div class="type water click">water</div>
                <div class="type grass click">grass</div>
                <div class="type electric click">electric</div>
                <div class="type psychic click">psychic</div>
                <div class="type ice click">ice</div>
                <div class="type dragon click">dragon</div>
                <div class="type dark click">dark</div>
                <div class="type fairy click">fairy</div>
                <div class="type shadow click">shadow</div>

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
                                    <div v-if=" filterName[index].type1 == 'fire'" class="type fire">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'poison'" class="type poison">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'normal'" class="type normal">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'fighting'" class="type fighting">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'flying'" class="type flying">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'ground'" class="type ground">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'rock'" class="type rock">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'bug'" class="type bug">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'ghost'" class="type ghost">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'steel'" class="type steel">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'water'" class="type water">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'grass'" class="type grass">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'electric'" class="type electric">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'psychic'" class="type psychic">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'ice'" class="type ice">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'dragon'" class="type dragon">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'dark'" class="type dark">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'fairy'" class="type fairy">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'unknown'" class="type unknown">{{ filterName[index].type1 }}</div>
                                    <div v-else-if="filterName[index].type1 == 'shadow'" class="type shadow">{{ filterName[index].type1 }}</div>

                                    <div v-if=" filterName[index].type2 == 'fire'" class="type fire">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'poison'" class="type poison">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'normal'" class="type normal">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'fighting'" class="type fighting">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'flying'" class="type flying">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'ground'" class="type ground">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'rock'" class="type rock">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'bug'" class="type bug">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'ghost'" class="type ghost">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'steel'" class="type steel">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'water'" class="type water">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'grass'" class="type grass">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'electric'" class="type electric">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'psychic'" class="type psychic">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'ice'" class="type ice">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'dragon'" class="type dragon">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'dark'" class="type dark">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'fairy'" class="type fairy">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'unknown'" class="type unknown">{{ filterName[index].type2 }}</div>
                                    <div v-else-if="filterName[index].type2 == 'shadow'" class="type shadow">{{ filterName[index].type2 }}</div>
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