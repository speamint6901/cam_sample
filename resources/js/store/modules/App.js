import * as api from './../../config';

export default {
    state: {
        isLoading: false,
    },
    mutations: {
        setLoading (state, payload) {
            state.isLoading = payload;
        },
    },
    getters: {
        isLoading: function (state) { return state.isLoading }
    }
}
