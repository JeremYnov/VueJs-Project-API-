new Vue({
    el: '#title',
    data: {
        id: "",
        infoPokemon: [],
        namePokemon: []
    },


    mounted: function () {
        this.id = window.location.href
        this.id = this.id.split("=")
        this.id = this.id[1]


        fetch(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
        .then(result => result.json())
        .then(result => { 
            pokemon = result.names[6].name
            this.namePokemon.push(pokemon)
        })
    },


    methods: {

    }

})