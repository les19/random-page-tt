import LinkApi from "../../api/customer/LinkApi";

const api = new LinkApi;

export default {
    namespaced: true,

    state: {
        item: {},
        history: [],
        result: {},
        loaded: false,
        expired: false,
        deactivated: false,
    },

    actions: {
        show({ commit }, id) {
            commit('CLEAR', []);
            api.show(id)
                .then(response => {
                    commit('SET_LINK', response.data.link);
                })
                .catch(error => {
                    if (error.response?.status === 419) {
                        commit('SET_EXPIRED');
                    } else {
                        console.error(error);
                    }
                })
                .finally(() => {
                    commit('SET_LOADED');
                })
        },

        game({ commit, state }) {
            api.game(state.item.game.id)
                .then(response => {
                    console.log(response.data);
                    commit('SET_RESULT', response.data.history);
                })
                .catch(error => {
                    console.error(error);
                })
                .finally(() => {
                    commit('SET_LOADED');
                })
        },

        deactivate({commit, state}){
            api.deactivate(state.item.id)
            .catch(error => {
                console.error(error);
            })
            .finally(() => {
                commit('SET_DEACTIVATED');
            })
        },

        getHistory({ commit, state }) {
            api.history(state.item.game.id)
                .then(response => {
                    commit('SET_HISTORY', response.data.data);
                })
                .catch(error => {
                    console.error(error);
                })
        }
    },

    mutations: {

        SET_LOADED(state) {
            state.loaded = true;
        },

        SET_LINK(state, link) {
            state.item = link;
        },

        SET_EXPIRED(state) {
            state.expired = true;
        },

        SET_DEACTIVATED(state) {
            state.deactivated = true;
        },

        SET_HISTORY(state, data) {
            state.history = data;
        },

        SET_RESULT(state, data) {
            state.result = data;
        },

        CLEAR(state){
            state.item = {};
            state.history = [];
            state.result = {};
            state.loaded = false;
            state.expired = false;
            state.deactivated = false;
        }

    }
}