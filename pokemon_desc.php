<?php include("includes/header.php");
if (!isset($_GET["id"])) {
    header("location: pokedex.php");
}
?>


<div id="app">
    <img :src="infoPokemon.image" alt="">
    <div class="poke-id">
        <p>{{ infoPokemon.id }}</p>
    </div>
    <div class="poke-name">
        <p>{{ infoPokemonSpecies.name }}</p>
    </div>
    <div class="poke-desc">
        <p>{{ infoPokemonSpecies.description }}</p>
    </div>
    <div class="poke-categorie">
        <p>{{ infoPokemonSpecies.categorie }}</p>
    </div>


    <div class="poke-type">
        <div v-if=" infoPokemon.type1 == 'fire'" class="type fire">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'poison'" class="type poison">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'normal'" class="type normal">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'fighting'" class="type fighting">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'flying'" class="type flying">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'ground'" class="type ground">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'rock'" class="type rock">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'bug'" class="type bug">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'ghost'" class="type ghost">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'steel'" class="type steel">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'water'" class="type water">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'grass'" class="type grass">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'electric'" class="type electric">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'psychic'" class="type psychic">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'ice'" class="type ice">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'dragon'" class="type dragon">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'dark'" class="type dark">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'fairy'" class="type fairy">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'unknown'" class="type unknown">{{ infoPokemon.type1 }}</div>
        <div v-else-if="infoPokemon.type1 == 'shadow'" class="type shadow">{{ infoPokemon.type1 }}</div>

        <div v-if=" infoPokemon.type2 == 'fire'" class="type fire">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'poison'" class="type poison">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'normal'" class="type normal">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'fighting'" class="type fighting">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'flying'" class="type flying">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'ground'" class="type ground">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'rock'" class="type rock">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'bug'" class="type bug">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'ghost'" class="type ghost">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'steel'" class="type steel">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'water'" class="type water">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'grass'" class="type grass">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'electric'" class="type electric">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'psychic'" class="type psychic">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'ice'" class="type ice">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'dragon'" class="type dragon">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'dark'" class="type dark">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'fairy'" class="type fairy">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'unknown'" class="type unknown">{{ infoPokemon.type2 }}</div>
        <div v-else-if="infoPokemon.type2 == 'shadow'" class="type shadow">{{ infoPokemon.type2 }}</div>
    </div>
    <div class="poke-phys">
        <p>{{ infoPokemon.taille }}</p>
        <p>{{ infoPokemon.poids }}</p>
    </div>
</div>


<?php require_once("includes/footer.php") ?>