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
        this.page = window.location.href
        this.page = this.page.split("=")
        this.page = this.page[1]
        this.page = Number(this.page)
        fetch('https://pokeapi.co/api/v2/pokemon/?offset=0&limit=964')
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
                                    id: result.id, name: result.name, image: result.sprites.front_default,
                                    type1: result.types[0].type.name, type2: result.types[1].type.name
                                }
                            } else {
                                pokemon = {
                                    id: result.id, name: result.name, image: result.sprites.front_default,
                                    type1: result.types[0].type.name
                                }
                            }
                            // this.infoPokemon[result.id] = pokemon
                            this.infoPokemon.push(pokemon)
                            if (index >= (20 * (this.page - 1)) && index <= ((20 * (this.page - 1)) + 20)){
                                this.filterPage.push(pokemon) 
                            }
                        })
                    fetch(`https://pokeapi.co/api/v2/pokemon-species/${index}`)
                        .then(result => result.json())
                        .then(result => {
                            pokemon = result.names[6].name
                            this.namePokemon.push(pokemon)
                        })
                }
            })
        console.log(this.filterPage)
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
            for (let index = 0; index < this.namePokemon.length; index++) {

                if (i != 100000000000) {
                    if (this.infoPokemon[index].type1 == this.typefilter[i] || this.infoPokemon[index].type2 == this.typefilter[i]) {
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


                else if (this.namePokemon[index].indexOf(this.name) === 0 || this.infoPokemon[index].id == this.name) {
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
                    this.FilterCheck = true
                    for (let i = 0; i < liste.length; i++) {
                        liste_destination[i] = liste[i]
                    }
                    this.FilterCheck = false
                } else {
                    this.FilterCheck = false
                    for (let i = 0; i < liste.length; i++) {
                        liste_destination[i] = liste[(liste.length - 1) - i]
                    }
                    this.FilterCheck = true
                }
            }
            liste_destination.forEach(element => {
                console.log(element.id)
            });
            // console.log(liste_destination)
        },

        page_filter(index) {
            window.location.replace(`pokedex.php?page=${index}`);
        }




    }

})