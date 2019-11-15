<template>
    <div id="app">
        <header>
    <nav>
        <ul id="menu">
            <li class="pokedex"><router-link to="/pokedex/1"><a>pokedex</a></router-link></li>
            <img src="https://media.tenor.com/images/fe61dc2b7ef08a538b906eced7fa5cb5/tenor.gif" alt="">
            <li class="pokebattle"><a href="pokebattle.php">Pokébattle</a></li>
        </ul>
    </nav>
</header>
    </div>
</template>






<style>
*{
 margin: 0;
 padding: 0;
}

nav{
    position: fixed;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

nav #menu{
    list-style: none;
    overflow: hidden;
    text-align: center;
    display: flex;
    align-items: center;
    background: #313131;
    border-radius: 0 0 20px 20px;
    
}

#menu img{
    width: 70px;
    padding: 0 40px;
}

#menu li{
    display: inline-block;
    padding: 20px 0;
    width: 220px;
}

.pokedex{
    border-right: 0.2px solid rgb(80, 80, 80);
}
.pokebattle{
    border-left: 0.2px solid rgb(80, 80, 80);
}

#menu li a{
    text-decoration: none;
    color: white;
    font-family: 'Righteous', cursive;
    font-size: 25px;
    text-transform: uppercase;
}

body{
    font-family: 'Righteous', cursive;
}
.capitalize{
    text-transform: capitalize;
}
.text-center{
    text-align: center;
}
.center{
    display: flex;
    justify-content: center;
}
</style>