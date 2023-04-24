import LinkApi from "../../api/customer/LinkApi";

const api = new LinkApi;

export default {
    namespaced: true,

    state: {
        items: [],
        loaded: false,
    },

    actions: {
        index({ commit }) {
            api.index()
                .then(response => {
                    commit('SET_LINKS', response.data.data);
                })
                .catch(error => {
                    console.error(error);
                })
                .finally(() => {
                    commit('SET_LOADED');
                })
        },

        addLink({commit}){
            api.addLink()
                .then(response => {
                    commit('ADD_LINKS', response.data.link);

                })
                .catch(error => {
                    console.error(error);
                })
                .finally(() => {
                    commit('SET_LOADED');
                })
        }
    },

    mutations: {

        SET_LOADED(state) {
            state.loaded = true;
        },

        SET_LINKS(state, links) {
            state.items = links;
        },

        ADD_LINKS(state, link) {
            state.items = [...state.items, link];
        },

    }
}