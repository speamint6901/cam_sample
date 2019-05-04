import * as config from './../../config';
import router from '../../router';

const state = {
    ur_errors: {
        name: '',
        email: '',
        password: '',
        policy: '',
    },
    message: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    policy: '',
    loading: false,
};


const mutations = {
    updateEmail: function (state, payload) { state.email = payload   },
    updateName: function (state, payload) { state.name = payload   },
    updatePassword: function (state, payload) { state.password = payload   },
    updatePasswordConfirmation: function (state, payload) { state.password_confirmation = payload   },
    updatePolicy: function (state, payload) { state.policy = payload   },
    updateLoading: function (state, payload) { state.loading = payload },
    register (state, formData) {
        state.formData = formData
    },
    ur_errors (state, payload) {
        if (payload.email != undefined) {
            state.ur_errors.email = payload.email[0];
        }
        if (payload.name != undefined) {
            state.ur_errors.name = payload.name[0];
        }
        if (payload.password != undefined) {
            state.ur_errors.password = payload.password[0];
        }
        if (payload.policy != undefined) {
            state.ur_errors.policy = payload.policy[0];
        }
    },
    unsetUrErrors (state) {
        state.ur_errors.email = '';
        state.ur_errors.name = '';
        state.ur_errors.password = '';
        state.ur_errors.policy = '';
    }
};


const getters = {
    ur_errors: function (state) { return state.ur_errors },
    email: function (state) { return state.email },
    name: function (state) { return state.name },
    password: function (state) { return state.password },
    password_confirmation: function (state) { return state.password_confirmation },
    policy: function (state) { return state.policy },
    loading: function (state) { return state.loading },
};


const actions = {
    register ({ commit, state }, formData) {
        commit('unsetUrErrors');
        axios.post(config.userRegister, {
            email: formData.email,
            name: formData.name,
            password: formData.password,
            password_confirmation: formData.password_confirmation,
            policy: formData.policy
        }).then(res => {
            commit('updateLoading', false);
            router.push({'path': '/register/complete'});
        }).catch(error => {
            console.log(error.response.data.errors);
            commit('ur_errors', error.response.data.errors);
            commit('updateLoading', false);
        });
    }
};

export default {
    state,
    mutations,
    getters,
    actions
};
