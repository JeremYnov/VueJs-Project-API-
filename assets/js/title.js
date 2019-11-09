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


        axios.get(`https://pokeapi.co/api/v2/pokemon-species/${this.id}`)
        .then((result) => {
            if(result.status != 200){
                window.location.replace("error.php")
            }
            pokemon = result.data.names[6].name
            this.namePokemon.push(pokemon)
        })
    },


    methods: {

    }

})