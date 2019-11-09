new Vue({
    el: '#app',
    data: {
        // moretype:"",
        id: "",
        infoPokemon: [],
        infoPokemonSpecies: [],
        infoType: [],
        infoType2: [],
        // AJOUTER LE 28/10/2019 A VERIFIER
        weaknesstable: [],
        strengthtable: [],
        typefilter: ["fire", "poison", "normal", "fighting", "flying", "ground", "rock", "bug", "ghost", "steel", "water", "grass", "electric", "psychic", "ice", "dragon", "dark", "fairy", "shadow"],
        // AJOUTER LE 28/10/2019 A VERIFIER
        firstEvolutionName: "",
        firstEvolution: [],
        secondEvolutionName: "",
        secondEvolution: [],
        lastEvolutionName:"",
        lastEvolution: []
        // FIN PARTIE AJOUTER
    },


    mounted: function () {
        this.id = window.location.href
        this.id = this.id.split("=")
        this.id = this.id[1]


        axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`)
            .then((result) => {
                if (result.data.types[1]) {
                    this.infoPokemon = {
                        id: result.data.id, image: result.data.sprites.front_default,
                        type1: result.data.types[0].type.name, type2: result.data.types[1].type.name,
                        taille: result.data.height, poids: result.data.weight,
                    }
                    // AJOUTER LE 28/10/2019 A VERIFIER
                    moretype = result.data.types[0].type.url
                    moretype1 = result.data.types[1].type.url
                    axios.get(moretype)
                        .then((result) => {
                            for (let index = 0; index < result.data.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.data.damage_relations.double_damage_from[index].name);
                                console.log(this.weaknesstable)
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.data.damage_relations.double_damage_to[index].name);
                            }
                        })
                    axios.get(moretype1)
                        .then((result) => {
                            console.log(result)
                            for (let index = 0; index < result.data.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.data.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.data.damage_relations.double_damage_to[index].name);
                            }
                        })
                    // FIN DE LA PARTIE AJOUTEE

                } else {
                    this.infoPokemon = {
                        id: result.data.id, image: result.data.sprites.front_default,
                        type1: result.data.types[0].type.name,
                        taille: result.data.height, poids: result.data.weight,
                    }
                    // AJOUTER LE 28/10/2019 A VERIFIER
                    moretype = result.data.types[0].type.url
                    axios.get(moretype)
                        .then((result) => {
                            for (let index = 0; index < result.data.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.data.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.data.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.data.damage_relations.double_damage_to[index].name);
                            }
                        })
                    // FIN DE LA PARTIE AJOUTEE
                }
                axios.get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
                    .then((result) => {
                        indextable = []
                        for (let index = 0; index < result.data.flavor_text_entries.length; index++) {
                            if (result.data.flavor_text_entries[index].language.name == "fr") {
                                indextable.push(index)
                            }
                        }
                        this.infoPokemonSpecies = { name: result.data.names[6].name, description: result.data.flavor_text_entries[indextable[0]].flavor_text + " " + result.data.flavor_text_entries[indextable[1]].flavor_text + " " + result.data.flavor_text_entries[indextable[2]].flavor_text, categorie: result.data.genera[6].genus }

                        //AJOUTER LE 03/11/2019 A VERIFIER
                        Pokevolution = result.data.evolution_chain.url
                        axios.get(Pokevolution)
                        .then((result) => {
                                if (typeof (result.data.chain.evolves_to[0]) == "undefined") {
                                    console.log("UNDEFINED")
                                }
                                else {
                                    urlSecondEvolution = result.data.chain.evolves_to[0].species.url
                                    console.log(urlSecondEvolution)
                                    axios.get(urlSecondEvolution)
                                    .then((result) => {
                                            this.secondEvolutionName = { name: result.data.names[6].name }
                                            urlSecondEvolution = result.data.varieties[0].pokemon.url
                                            axios.get(urlSecondEvolution)
                                            .then((result) => {
                                                    this.secondEvolution = { id: result.data.id, image: result.data.sprites.front_default }
                                                })
                                        })
                                    if (typeof (result.data.chain.evolves_to[0].evolves_to[0]) == "undefined") {
                                        console.log("UNDEFINED")
                                    }
                                    else {
                                        urlLastEvolution = result.data.chain.evolves_to[0].evolves_to[0].species.url
                                        console.log(urlLastEvolution)
                                        axios.get(urlLastEvolution)
                                        .then((result) => {
                                                this.lastEvolutionName = { name: result.data.names[6].name }
                                                urlLastEvolution = result.data.varieties[0].pokemon.url
                                                axios.get(urlLastEvolution)
                                                .then((result) => {
                                                        this.lastEvolution = { id: result.data.id, image: result.data.sprites.front_default }
                                                    })
                                            })
                                    }
                                }

                                urlFirstEvolution = result.data.chain.species.url
                                axios.get(urlFirstEvolution)
                                .then((result) => {
                                        this.firstEvolutionName = { name: result.data.names[6].name }
                                        urlFirstEvolution = result.data.varieties[0].pokemon.url
                                        axios.get(urlFirstEvolution)
                                        .then((result) => {
                                                this.firstEvolution = { id: result.data.id, image: result.data.sprites.front_default }
                                            })
                                    })
                            })
                        //FIN DE LA PARTIE AJOUTEE
                    })
            })
    },


    methods: {

    }

})