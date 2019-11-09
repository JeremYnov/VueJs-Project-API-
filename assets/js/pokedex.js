new Vue({
    el: '#pokedex',
    data: {
        urlPokemon: '',
        infoPokemon: [],
        namePokemon: [],
        typefilter: ["fire", "poison", "normal", "fighting", "flying", "ground", "rock", "bug", "steel", "water", "grass", "electric", "psychic", "ice", "dragon", "dark", "fairy", "shadow"],
        name: '',
        filterName: [],
        FilterCheck: false,
        trie: "",
        page: "",
        filterPage: []
    },


    mounted: function () {
        axios.get('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=500')
        .then((response) => {
                for (let index = 1; index < response.data.results.length; index++) {
                    if (index == 116 || index == 121 || index == 132 || index == 276) { // pas de pokemon sur ces index dans l'api
                    } else {
                        axios.get(`https://pokeapi.co/api/v2/pokemon/${index}`)
                        .then((result) => {
                                axios.get(`https://pokeapi.co/api/v2/pokemon-species/${index}`)
                                .then((results) => {
                                        let pokemon
                                        if (result.data.types[1]) {
                                            pokemon = {
                                                id: result.data.id, name: results.data.names[6].name, image: result.data.sprites.front_default,
                                                type1: result.data.types[0].type.name, type2: result.data.types[1].type.name
                                            }
                                        } else {
                                            pokemon = {
                                                id: result.data.id, name: results.data.names[6].name, image: result.data.sprites.front_default,
                                                type1: result.data.types[0].type.name
                                            }
                                        }
                                        this.page = window.location.href
                                        this.page = this.page.split("=")
                                        this.page = this.page[1]
                                        this.page = Number(this.page)
                                        if (this.page == 1) {
                                            if (index >= (22 * (this.page - 1)) && index <= ((22 * (this.page - 1)) + 21)) {
                                                console.log(pokemon)
                                                this.filterPage.push(pokemon)
                                            }
                                        } else {
                                            if (index >= (22 * (this.page - 1)) && index <= ((22 * (this.page - 1)) + 20)) {
                                                this.filterPage.push(pokemon)
                                            }
                                        }

                                    })

                            })

                    }
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

        filter(i) {
            this.filterName = []
            let validate = 0
            let info
            for (let index = 0; index < this.infoPokemon.length; index++) {
                if (i != 100000000000) {
                    if (this.infoPokemon[index].type1 == this.typefilter[i] || this.infoPokemon[index].type2 == this.typefilter[i]) {
                        this.FilterCheck = true
                        validate = 1
                        if (this.infoPokemon[index].type2) {
                            info = {
                                name: this.infoPokemon[index].name, id: this.infoPokemon[index].id, image: this.infoPokemon[index].image,
                                type1: this.infoPokemon[index].type1, type2: this.infoPokemon[index].type2
                            }
                        } else {
                            info = {
                                name: this.infoPokemon[index].name, id: this.infoPokemon[index].id, image: this.infoPokemon[index].image,
                                type1: this.infoPokemon[index].type1
                            }
                        }
                        this.filterName.push(info)
                    }
                }
                else if (this.infoPokemon[index].name.indexOf(this.name) === 0 || this.infoPokemon[index].id == this.name) {
                    this.FilterCheck = true
                    validate = 1
                    if (this.infoPokemon[index].type2) {
                        info = {
                            name: this.infoPokemon[index], id: this.infoPokemon[index].id, image: this.infoPokemon[index].image,
                            type1: this.infoPokemon[index].type1, type2: this.infoPokemon[index].type2
                        }
                    } else {
                        info = {
                            name: this.infoPokemon[index], id: this.infoPokemon[index].id, image: this.infoPokemon[index].image,
                            type1: this.infoPokemon[index].type1
                        }
                    }
                    this.filterName.push(info)
                }
            }
            if (validate == 0) {
                this.FilterCheck = false
            }
        },

        trie_pokemon(liste = [], liste_destination = []) {

            if (this.trie == 4 || this.trie == 3) {
                for (let i = 0; i < liste.length; i++) {
                    for (let index = 0; index < liste.length; index++) {
                        if ((index + 1) != liste.length) {
                            if (liste[index + 1].id > liste[index].id) {
                                let objet = liste[index]
                                liste[index] = liste[index + 1]
                                liste[index + 1] = objet
                            }
                        }
                    }
                }
                if (this.trie == 4) {
                    this.FilterCheck = false
                    for (let i = 0; i < liste.length; i++) {
                        liste_destination[i] = liste[i]
                    }
                    this.FilterCheck = true
                } else {
                    this.FilterCheck = false
                    for (let i = 0; i < liste.length; i++) {
                        liste_destination[i] = liste[(liste.length - 1) - i]
                    }
                    this.FilterCheck = true
                }

            } else {
                for (let i = 0; i < liste.length; i++) {
                    for (let index = 0; index < liste.length; index++) {
                        if ((index + 1) != liste.length) {
                            if (liste[index + 1].name > liste[index].name) {
                                let objet = liste[index]
                                liste[index] = liste[index + 1]
                                liste[index + 1] = objet
                            }
                        }
                    }
                }
                if (this.trie == 2) {
                    this.FilterCheck = false
                    for (let i = 0; i < liste.length; i++) {
                        liste_destination[i] = liste[i]
                    }
                    this.FilterCheck = true
                } else {
                    this.FilterCheck = false
                    for (let i = 0; i < liste.length; i++) {
                        liste_destination[i] = liste[(liste.length - 1) - i]
                    }
                    this.FilterCheck = true
                }
            }
        },

        page_filter(index) {
            window.location.replace(`pokedex.php?page=${index}`);
        }




    }

})