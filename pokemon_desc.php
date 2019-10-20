<?php include("includes/header.php"); 
if(!isset($_GET["id"])){
    header("location: pokedex.php");
}
?>


<div id="app">
    <p>{{ infoPokemon.name }}</p>
</div>


<?php require_once("includes/footer.php") ?>