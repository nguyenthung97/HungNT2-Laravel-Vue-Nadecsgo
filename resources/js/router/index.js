import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const Map = () => import("~/pages/Map.vue");

export default router = new Router({
    routes: [
        { 
            path: '/maps/:mapname',
            component: Map,
        },
        {
            path: '/users/:usersteamid',
            component: User,
        }
    ],
    mode: 'history'
})
