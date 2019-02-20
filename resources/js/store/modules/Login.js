import * as config from './../../config';
import router from '../../router';
import jwtToken from '../../localStorage';

const state = {
    isError = false,
    email: '',
    password: '',
    loading: false,
};


const mutations = {
    updateEmail: function (state, payload) { state.email = payload   },
    updatePassword: function (state, payload) { state.password = payload   },
    updateLoading: function (state, payload) { state.loading = payload },
    doLogin function (state, payload) {
        state.isError = null;
        jwtToken.setToken(payload);
    },
    isError function (state, payload) { state.isError = payload },
};


const getters = {
    isError: function (state) { return state.isError }, 
    email: function (state) { return state.email },
    password: function (state) { return state.password },
    loading: function (state) { return state.loading },
};


const actions = {
    register ({ commit, state }, formData) {
        axios.post(config.login, {
            email: formData.email,
            password: formData.password,
        }).then(res => {
            commit('doLogin', res.data.access_token);
            commit('updateLoading', false);
            router.push({'path': '/'});
        }).catch(error => {
            commit('isError', true);
        });
    }
};

export default {
    state,
    mutations,
    getters,
    actions
};
