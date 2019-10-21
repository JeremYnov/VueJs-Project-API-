<?php include("includes/header.php");
if (!isset($_GET["id"])) {
    header("location: pokedex.php");
}
?>

<section class="background">
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

            <div v-for="(todo, value) in typefilter">
                <div v-if=" infoPokemon.type1 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon.type1 }} </div>
                <div v-if=" infoPokemon.type2 == typefilter[value]" class="type click" v-bind:class="typefilter[value]"> {{ infoPokemon.type2 }} </div>

            </div>

        </div>
        <div class="poke-phys">
            <p>{{ infoPokemon.taille }}</p>
            <p>{{ infoPokemon.poids }}</p>
        </div>
    </div>
</section>

<?php require_once("includes/footer.php") ?>