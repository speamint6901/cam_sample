import * as config from './../../config';

const state = {
    errors: null,
    message: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
};


const mutations = {
    updateEmail: function (state, payload) { state.email = payload   },
    updateName: function (state, payload) { state.name = payload   },
    updatePassword: function (state, payload) { state.password = payload   },
    updatePasswordConfirmation: function (state, payload) { state.password_confirmation = payload   },
    register (state, formData) {
        state.formData = formData
    },
    errors (state, errors) {
        state.errors = errors.response.data.errors
    }
};


const getters = {
    email: function (state) { return state.email },
    name: function (state) { return state.name },
    password: function (state) { return state.password },
    password_confirmation: function (state) { return state.password_confirmation },
};


const actions = {
    register ({ commit, state }, formData) {
        axios.post(config.userRegister, {
            email: formData.email,
            name: formData.name,
            password: formData.password,
            password_confirmation: formData.password_confirmation
        }).then(res => {
            commit('register', res);
        }).catch(error => {
            commit('errors', error);
        });
    }
};

export default {
    state,
    mutations,
    getters,
    actions
};
