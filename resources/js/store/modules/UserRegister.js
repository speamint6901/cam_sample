const state = {
    isError: false,
    errors: [],
    message: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
};


const mutations = {
    register (state, formData) {
        state.formData = formData
    },
    errors (state, errors) {
        state.errors = errors
    }
};


const getters = {
    getErrors: (state, getters) => {
        return state.errors
    }
};


const actions = {
    register ({ commit, state }, formData) {
        axios.post('/api/register', {
            email: formData.email,
            name: formData.name,
            password: formData.password,
            password_confirmation: formData.password_confirmation
        }).then(res => {
            commit('register', res);
        }).catch(error => {
            commit('errors', error.response.data.errors);
        });
    }
};

export default {
    state,
    mutations,
    getters,
    actions
};
