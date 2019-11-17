import Vue from 'vue'
import Router from 'vue-router'
import Pokedex from '@/components/pages/pokedex'
import Pokeitem from '@/components/pages/pokeitem'
import Pokedesc from '@/components/pages/pokedesc'
import HelloWorld from '@/components/HelloWorld'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/pokedex/:id',
            name: 'Pokedex',
            component: Pokedex
        },
        {
            path: '/pokeitem',
            name: 'Pokeitem',
            component: Pokeitem
        },
        {
            path: '/pokedesc/:id',
            name: 'Pokedesc',
            component: Pokedesc
        },
        {
            path: '/',
            name: 'hello',
            component: HelloWorld
        }
    ]
})