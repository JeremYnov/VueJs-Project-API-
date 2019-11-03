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


        fetch(`https://pokeapi.co/api/v2/pokemon/${this.id}`)
            .then(result => result.json())
            .then(result => {
                if (result.types[1]) {
                    this.infoPokemon = {
                        id: result.id, image: result.sprites.front_default,
                        type1: result.types[0].type.name, type2: result.types[1].type.name,
                        taille: result.height, poids: result.weight,
                    }
                    // AJOUTER LE 28/10/2019 A VERIFIER
                    moretype = result.types[0].type.url
                    moretype1 = result.types[1].type.url
                    fetch(moretype)
                        .then(result => result.json())
                        .then(result => {
                            for (let index = 0; index < result.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.damage_relations.double_damage_to[index].name);
                            }
                        })
                    fetch(moretype1)
                        .then(result => result.json())
                        .then(result => {
                            for (let index = 0; index < result.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.damage_relations.double_damage_to[index].name);
                            }
                        })
                    // FIN DE LA PARTIE AJOUTEE

                } else {
                    this.infoPokemon = {
                        id: result.id, image: result.sprites.front_default,
                        type1: result.types[0].type.name,
                        taille: result.height, poids: result.weight,
                    }
                    // AJOUTER LE 28/10/2019 A VERIFIER
                    moretype = result.types[0].type.url
                    fetch(moretype)
                        .then(result => result.json())
                        .then(result => {
                            for (let index = 0; index < result.damage_relations.double_damage_from.length; index++) {
                                this.weaknesstable.push(result.damage_relations.double_damage_from[index].name);
                            }
                            for (let index = 0; index < result.damage_relations.double_damage_to.length; index++) {
                                this.strengthtable.push(result.damage_relations.double_damage_to[index].name);
                            }
                        })
                    // FIN DE LA PARTIE AJOUTEE
                }
                fetch(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
                    .then(result => result.json())
                    .then(result => {
                        indextable = []
                        for (let index = 0; index < result.flavor_text_entries.length; index++) {
                            if (result.flavor_text_entries[index].language.name == "fr") {
                                indextable.push(index)
                            }
                        }
                        this.infoPokemonSpecies = { name: result.names[6].name, description: result.flavor_text_entries[indextable[0]].flavor_text + " " + result.flavor_text_entries[indextable[1]].flavor_text + " " + result.flavor_text_entries[indextable[2]].flavor_text, categorie: result.genera[6].genus }

                        //AJOUTER LE 03/11/2019 A VERIFIER
                        Pokevolution = result.evolution_chain.url
                        fetch(Pokevolution)
                            .then(result => result.json())
                            .then(result => {
                                if (typeof (result.chain.evolves_to[0]) == "undefined") {
                                    console.log("UNDEFINED")
                                }
                                else {
                                    urlSecondEvolution = result.chain.evolves_to[0].species.url
                                    console.log(urlSecondEvolution)
                                    fetch(urlSecondEvolution)
                                        .then(result => result.json())
                                        .then(result => {
                                            this.secondEvolutionName = { name: result.names[6].name }
                                            urlSecondEvolution = result.varieties[0].pokemon.url
                                            fetch(urlSecondEvolution)
                                                .then(result => result.json())
                                                .then(result => {
                                                    this.secondEvolution = { id: result.id, image: result.sprites.front_default }
                                                })
                                        })
                                    if (typeof (result.chain.evolves_to[0].evolves_to[0]) == "undefined") {
                                        console.log("UNDEFINED")
                                    }
                                    else {
                                        urlLastEvolution = result.chain.evolves_to[0].evolves_to[0].species.url
                                        console.log(urlLastEvolution)
                                        fetch(urlLastEvolution)
                                            .then(result => result.json())
                                            .then(result => {
                                                this.lastEvolutionName = { name: result.names[6].name }
                                                urlLastEvolution = result.varieties[0].pokemon.url
                                                fetch(urlLastEvolution)
                                                    .then(result => result.json())
                                                    .then(result => {
                                                        this.lastEvolution = { id: result.id, image: result.sprites.front_default }
                                                    })
                                            })
                                    }
                                }

                                urlFirstEvolution = result.chain.species.url
                                fetch(urlFirstEvolution)
                                    .then(result => result.json())
                                    .then(result => {
                                        this.firstEvolutionName = { name: result.names[6].name }
                                        urlFirstEvolution = result.varieties[0].pokemon.url
                                        fetch(urlFirstEvolution)
                                            .then(result => result.json())
                                            .then(result => {
                                                this.firstEvolution = { id: result.id, image: result.sprites.front_default }
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