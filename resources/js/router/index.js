import Vue from 'vue';
import VueRouter from 'vue-router';

import store from '../store'
const Map = () => import('~/pages/Map.vue');
const UserDetail = () => import('~/pages/UserDetail.vue')
const CreateNade = () => import('~/pages/CreateNade.vue')
const VideoDetail = () => import('~/pages/VideoDetail.vue')
const Sidebar = () => import('~/components/elements/Sidebar.vue')

Vue.use(VueRouter);

const routes = [,
    {
        path: '/maps/:mapname',
        components: {
            default: Map,
            subComponent1 : Sidebar,
        },
        name: 'map',
    },
    {
        path: '/createnade',
        component: CreateNade,
        name: 'createnade',
        meta: {
            layout: 'no-sidebar'
        }
    },
    {
        path: '/users/:usersteamid',
        component: UserDetail,
        name: 'UserDetail',
        meta: {
            layout: 'no-sidebar'
        }
    },
    {
        path: '/nades/:slug',
        component: VideoDetail,
        name: 'VideoDetail',
        meta: {
            layout: 'only-header'
        }
    }
   
]

const router = new VueRouter({
    mode: "history",
    routes: routes,
});

router.beforeEach((to, from, next) => {
    if (!to.meta.middleware) {
        return next()
    }
    const middleware = to.meta.middleware

    const context = {
        to,
        from,
        next,
        store
    }
    return middleware[0]({
        ...context
    })
})

export default router;
