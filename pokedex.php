<?php include("includes/header.php");
if (!isset($_GET["page"])) {
    header("location: index.php");
}
?>
<section class="background">
    <div id="pokedex">
        <div class="pokedex-content-container">

            <div id="filter" class="poke-filter">
                <div class="poke-filter-container">
                    <div class="poke-logo-filter">
                        <img src="assets/icons/icon-pokeball.png" alt="">
                    </div>

                    <div v-if="page < 4">
                        <button class="page" v-for="n in 5" v-on:click="page_filter(n)"> {{ n }} </button>
                    </div>
                    <div v-else>
                        <button class="page" v-for="n in (page + 2)" v-if="n >= (page - 2)" v-on:click="page_filter(n)"> {{ n }} </button>
                    </div>

                    <div class="searchbar">
                        <input type="text" v-model="name" placeholder="Rechercher..." class="poke-searchbar">
                        <button v-on:click="filter(100000000000)" class="searchbar-button click"><img src="assets/icons/icons8-chercher-40.png" alt=""></button>
                    </div>

                    <p v-if="FilterCheck == false">Aucun Pokémon selectionné (ne pas oublier la majuscule pour la premiere lettre)</p>

                    <button v-on:click="pokedex()" v-else class="poke-pokedex click">Afficher le pokedex entier</button>

                    <div class="poke-select">
                        <select v-model="trie">
                            <option value="1">Ordre Alphabétique A-Z</option>
                            <option value="2">Ordre Alphabétique Z-A</option>
                            <option value="3">Numéro le plus bas en premier</option>
                            <option value="4">Numéro le plus haut en premier</option>
                        </select>
                        <button v-on:click="trie_pokemon(infoPokemon,filterName)"> Valider </button>
                    </div>
                    <div class="poke-filter-type">
                        <div v-for="(todo, index) in typefilter" class="type-container">
                            <div v-on:click="filter(index)" class="type click" v-bind:class="typefilter[index]"> {{ typefilter[index] }} </div>
                        </div>
                    </div>
                    <div class="item-page">
                        <a href="pokemon_item.php" class="item-page-button"><img src="assets/icons/icons8-pokebag-50.png" alt=""> Voir les items</a>
                    </div>

                </div>

            </div>



            <div class="poke-container">

                <div v-if="FilterCheck == false">
                    <div class="poke-wrapper">
                        <div v-on:click="url(value.id)" v-for="value in filterPage" class="pokemon">

                            <a v-bind:href="urlPokemon">
                                <div class="poke-image">
                                    <img :src="value.image" alt="">
                                </div>
                                <div class="poke-infos">
                                    <div class="poke-id">
                                        <p v-if="value.id < 9">N°00{{ value.id}}</p>
                                        <p v-else-if="value.id < 100">N°0{{ value.id}}</p>
                                        <p v-else>N°{{ value.id + 1}}</p>
                                    </div>
                                    <div class="poke-name">
                                        <p>{{ value.name }}</p>
                                    </div>
                                    <div class="poke-type">

                                        <div v-for="(todo, value) in typefilter" v-if=" value.type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ value.type1 }} </div>
                                        <div v-for="(todo, value) in typefilter" v-if=" value.type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ value.type2 }} </div>

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
                                        <p v-else-if="filterName[index].id < 100">N°0{{ filterName[index].id }}</p>
                                        <p v-else>N°{{ filterName[index].id }}</p>
                                    </div>
                                    <div class="poke-name">
                                        <p>{{ filterName[index].name }}</p>
                                    </div>
                                    <div class="poke-type">

                                        <div v-for="(todo, value) in typefilter" v-if=" filterName[index].type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ filterName[index].type1 }} </div>
                                        <div v-for="(todo, value) in typefilter" v-if=" filterName[index].type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ filterName[index].type2 }} </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once("includes/footer.php") ?>