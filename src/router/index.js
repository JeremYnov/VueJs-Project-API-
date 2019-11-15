import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Pokedex from '@/components/pages/pokedex'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'hello',
            component: HelloWorld
        },
        {
            path: '/pokedex',
            name: 'Pokedex',
            component: Pokedex
        }
    ]
})