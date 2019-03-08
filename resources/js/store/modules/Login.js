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
        console.log(jwtToken.getToken());
    },
    isError: function (state, payload) { state.isError = true },
};


const getters = {
    isError: function (state) { return state.isError }, 
    loginEmail: function (state) { return state.email },
    loginPassword: function (state) { return state.password },
};


const actions = {
    login ({ commit, state }, formData) {
        return new Promise((resolve, reject) => {
            axios.post(config.login, {
                email: formData.email,
                password: formData.password,
            }).then(res => {
                if (res.data.error != undefined) {
                    commit('isError', true);
                } else {
                    commit('doLogin', res.data.access_token);
                }
                resolve();
            }).catch(error => {
                console.log("login failure!");
                reject(); 
            });
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
