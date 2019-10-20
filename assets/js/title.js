new Vue({
    el: '#title',
    data: {
        id: "",
        infoPokemon: []
    },


    mounted: function () {
        this.id = window.location.href
        this.id = this.id.split("=")
        this.id = this.id[1]


        fetch(`https://pokeapi.co/api/v2/pokemon/${this.id}`)
            .then(result => result.json())
            .then(result => {
                this.infoPokemon = {name: result.name}
            })
    },


    methods: {

    }

})