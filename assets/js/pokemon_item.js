new Vue({
    el: '#item',
    data: {
        infoItem: [],
        // filterName: [],
        // FilterCheck: false
    },


    mounted: function () {
        axios.get('https://pokeapi.co/api/v2/item/?offset=0&limit=200')
        .then((json) => {
            if(json.status != 200){
                window.location.replace("error.php")
            }
                for (let index = 1; index < json.data.results.length; index++) {
                    // console.log("l'index est: " + index)
                    axios.get(`https://pokeapi.co/api/v2/item/${index}`)
                        .then((result) => {
                            if(result.status != 200){
                                window.location.replace("error.php")
                            }
                            // console.log("l'index est: " + index)
                            // console.log("l'id est: " + result.id)
                            item = {
                                id: result.data.id, image: result.data.sprites.default,
                                name: result.data.names[6].name, description: result.data.flavor_text_entries[6].text,
                            }
                            // this.infoPokemon[result.id] = pokemon
                            this.infoItem.push(item)

                        })
                }
            })
    },

})