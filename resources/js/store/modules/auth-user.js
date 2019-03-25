import * as api from './../../config';

export default {
    state: {
        authenticated: false,
        init: null,
        user_id: null,
        name: null,
    },
    getters: {
        authenticated: state => state.authenticated,
        init: state => state.init
    },
    mutations: {
        setAuthUser (state, payload) {
            state.init = true
            state.authenticated = payload.user.authenticated;
            if (payload.user.authenticated) {
                state.user_id = payload.user.user.id;
                state.name = payload.user.user.name;
            }
        },
        unsetAuthUser (state, payload) {
            state.authenticated = false;
            state.user_id = null;
            state.name = null;
        }
    },
    actions: {
        setAuthUser: ({commit, dispatch}) => {
            axios.get(api.currentUser)
                .then(response => {
                    commit({
                        type: "setAuthUser",
                        user: response.data
                    })
                })
                .catch(error => {
                    dispatch('logoutRequest');
                })
        },
        unsetAuthUser: ({commit}) => {
            commit({
                type: 'unsetAuthUser'
            });
        }
    }
}
