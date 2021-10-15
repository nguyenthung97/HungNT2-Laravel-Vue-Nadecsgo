import axios from "axios"
import Cookies from "js-cookies"
import * as types from "../mutation-types";

export const state = {
    user: null,
    token: Cookies.get("token")
}

export const getters = {
    user: state => (state.user != null ? state.user.info : null),
    token: state => state.token,
}

export const mutations = {
    [types.SAVE_TOKEN](state, { token, remember }){ 
        state.token = token;
        Cookies.set("token", token, { expires: remember ? 365 : null});
    },

    [types.FETCH_USER_SUCCESS](state, { user }) {
        state.user = user ; 
    }, 

    [types.FETCH_USER_FAILURE](state) {
        state.token = null;
        Cookies.remove("token");
    },

    [types.LOGOUT](state) {
        state.user = null;
        state.token = null;

        Cookies.remove("token");
    },

    [types.UPDATE_USER](state, { user }) {
        state.user = user;
    }
}

export const actions = {
    saveToken({ commit }, payload) {
        commit(types.SAVE_TOKEN, payload);
    },
}