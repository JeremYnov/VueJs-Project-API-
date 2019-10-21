new Vue({
    el: '#app',
    data: {
        id: "",
        infoPokemon: [],
        infoPokemonSpecies: [],
        infoPokemonEvo: [],
        typefilter: ["fire", "poison", "normal","fighting","flying","ground","rock","bug","ghost","steel","water","grass","electric","psychic","ice","dragon","dark","fairy","shadow"],
    },


    mounted: function () {
        this.id = window.location.href
        this.id = this.id.split("=")
        this.id = this.id[1]


        fetch(`https://pokeapi.co/api/v2/pokemon/${this.id}`)
            .then(result => result.json())
            .then(result => {
                if (result.types[1]) {
                    this.infoPokemon = {
                        id: result.id, image: result.sprites.front_default,
                        type1: result.types[0].type.name, type2: result.types[1].type.name,
                        taille: result.height, poids: result.weight,
                    }
                } else {
                    this.infoPokemon = {
                        id: result.id, image: result.sprites.front_default,
                        type1: result.types[0].type.name
                    }
                }
                fetch(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
                    .then(result => result.json())
                    .then(result => {
                        this.infoPokemonSpecies = { name: result.names[6].name, description: result.flavor_text_entries[5].flavor_text + result.flavor_text_entries[29].flavor_text + result.flavor_text_entries[21].flavor_text }
                    })
            })
    },


    methods: {

    }

})