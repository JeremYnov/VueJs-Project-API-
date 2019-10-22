new Vue({
    el: '#item',
    data: {
        infoItem: [],
        // filterName: [],
        // FilterCheck: false
    },


    mounted: function () {
        fetch('https://pokeapi.co/api/v2/item/?offset=0&limit=200')
            .then(response => response.json())
            .then(json => {
                for (let index = 1; index < json.results.length; index++) {
                    // console.log("l'index est: " + index)
                    fetch(`https://pokeapi.co/api/v2/item/${index}`)
                        .then(result => result.json())
                        .then(result => {
                            // console.log("l'index est: " + index)
                            // console.log("l'id est: " + result.id)
                            item = {
                                id: result.id, image: result.sprites.default,
                                name: result.names[6].name, description:result.flavor_text_entries[6].text,
                            }
                            // this.infoPokemon[result.id] = pokemon
                            this.infoItem.push(item)

                        })
                }
            })
    },

})