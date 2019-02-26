import * as config from './../../config';
import router from '../../router';
import jwtToken from '../../localStorage';

const state = {
    isError: false,
    email: '',
    password: '',
    loading: false,
    authUser: null
};


const mutations = {
    updateEmail: function (state, payload) { state.email = payload   },
    updatePassword: function (state, payload) { state.password = payload   },
    doLogin: function (state, payload) {
        state.isError = null;
        jwtToken.setToken(payload);
    },
    isError: function (state, payload) { state.isError = payload },
};


const getters = {
    isError: function (state) { return state.isError }, 
    loginEmail: function (state) { return state.email },
    loginPassword: function (state) { return state.password },
};


const actions = {
    login ({ commit, state }, formData) {
        axios.post(config.login, {
            email: formData.email,
            password: formData.password,
        }).then(res => {
            console.log(res.data);
            commit('doLogin', res.data.access_token);
            router.push({'path': '/'});
        }).catch(error => {
            commit('isError', true);
        });
    },
    logoutRequest: ({dispatch}) => {
        jwtToken.removeToken();
        router.push({'path': '/login'});
        return new Promise((resolve, reject) => {
            dispatch('unsetAuthUser');
            resolve();
        });
    },
};

export default {
    state,
    mutations,
    getters,
    actions
};
