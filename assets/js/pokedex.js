new Vue({
    el: '#pokedex',
    data: {
        urlPokemon: '',
        infoPokemon: [],
        namePokemon: [],
        typefilter: ["fire", "poison", "normal","fighting","flying","ground","rock","bug","ghost","steel","water","grass","electric","psychic","ice","dragon","dark","fairy","shadow"],
        filterType: false,
        name: '',
        filterName: [],
        FilterCheck: false
    },


    mounted: function () {
        fetch('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=100')
            .then(response => response.json())
            .then(json => {
                for (let index = 1; index < json.results.length; index++) {
                    // console.log("l'index est: " + index)
                    fetch(`https://pokeapi.co/api/v2/pokemon/${index}`)
                        .then(result => result.json())
                        .then(result => {
                            // console.log("l'index est: " + index)
                            // console.log("l'id est: " + result.id)
                            let pokemon
                            if (result.types[1]) {
                                pokemon = {
                                    id: result.id, image: result.sprites.front_default,
                                    type1: result.types[0].type.name, type2: result.types[1].type.name
                                }
                            } else {
                                pokemon = {
                                    id: result.id, image: result.sprites.front_default,
                                    type1: result.types[0].type.name
                                }
                            }
                            // this.infoPokemon[result.id] = pokemon
                            this.infoPokemon.push(pokemon)

                        })
                    fetch(`https://pokeapi.co/api/v2/pokemon-species/${index}`)
                        .then(result => result.json())
                        .then(result => {
                            pokemon = result.names[6].name
                            this.namePokemon.push(pokemon)
                        })
                }
            })

    },


    methods: {
        url(index) {
            this.urlPokemon = `http://localhost/Poke-projet/pokemon_desc.php?id=${index}`
        },

        pokedex() {
            this.FilterCheck = false
        },

        filter() {
            this.filterName = []
            let validate = 0
            let info
            for (let index = 0; index < this.namePokemon.length; index++) {
                if (this.namePokemon[index].indexOf(this.name) === 0 || this.infoPokemon[index].id == this.name) {
                    this.FilterCheck = true
                    validate = 1
                    if (this.infoPokemon[index].type2) {
                        info = {
                            name: this.namePokemon[index], id: this.infoPokemon[index].id, image: this.infoPokemon[index].image,
                            type1: this.infoPokemon[index].type1, type2: this.infoPokemon[index].type2
                        }
                    } else {
                        info = {
                            name: this.namePokemon[index], id: this.infoPokemon[index].id, image: this.infoPokemon[index].image,
                            type1: this.infoPokemon[index].type1
                        }
                    }
                    this.filterName.push(info)
                }
            }
            if (validate == 0 || this.name == "") {
                this.FilterCheck = false
            }
        },

        type(index) {
            
        }


    }

})