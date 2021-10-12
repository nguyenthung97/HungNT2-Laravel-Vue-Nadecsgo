import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state() {
        return{
            videoidstate : 1,
        }
    },
    getters: { 
        getVideoId: state => {
            return state.videoidstate;
        }
    },
    mutations: {
        // congVideoId: state => {
        //     state.videoidcanlay += 1;
        // },
        // truVideoId: state => {
        //     state.videoidcanlay -= 1;
        // },
        truyenVideoId(state, payload){
            state.videoidstate =  payload
        }
    },
    actions: {
        truyenVideoId: (context, payload) => {
            setTimeout(function(){
                context.commit('truyenVideoId',payload)
            }, 1);
        }
    }
});
