import CustomerApi from "../../api/customer/CustomerApi";

const api = new CustomerApi;

export default {
    namespaced: true,

    state: {
        current: {},
        success: true,
        logged: false,
        loaded: false,
    },

    actions: {
        getCurrent({ commit }) {
            api.current()
                .then(response => {
                    commit('SUCCESS');
                    commit('SET_LOGGED');
                    commit('SET_CURRENT', response.data.customer);
                })
                .catch(error => {
                    commit('FAILED');
                })
                .finally(() => {
                    commit('SET_LOADED');
                })
        },

        logout({ commit }) {
            api.logout()
                .then(response => {
                    commit('SET_UNLOGGED');
                    commit('REMOVE_CURRENT');
                })
                .catch(error => {
                    commit('FAILED');
                })
        },

        create({ commit }, { phone, name }) {
            api.create({
                name,
                phone,
            })
                .then(response => {
                    commit('SET_LOGGED');
                    commit('SET_CURRENT', response.data.customer);
                })
                .catch(error => {
                    commit('FAILED');
                });
        },

    },

    mutations: {

        FAILED(state) {
            state.success = false;
        },

        SUCCESS(state) {
            state.success = true;
        },

        SET_CURRENT(state, data) {
            state.current = data;
        },

        SET_LOGGED(state) {
            state.logged = true;
        },

        SET_LOADED(state) {
            state.loaded = true;
        },

        SET_UNLOGGED(state) {
            state.logged = false;
        },

        REMOVE_CURRENT(state) {
            state.current = {};
        },

    }
}