new Vue({
    el: '#primary',
    data: {
        urlPokemon: 'tsgdfhg',
        infoPokemon: [],
        namePokemon: []
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
                console.log(this.namePokemon) 
            })

    },


    methods: {
        url(index) {
            this.urlPokemon = `http://localhost/ProjetJavaScriptPokemon/pokemon_desc.php?id=${index}`
        },
    }

})