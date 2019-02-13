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
    }
};


const getters = {
};


const actions = {
    register ({ commit }, formData) {
        axios.post('/api/register', {
            email: formData.email,
            name: formData.name,
            password: formData.password,
            password_confirmation: formData.password_confirmation
        }).then(res => {
            commit('register', res);
            console.log(res);
        }).catch(error => {
            commit('register', error.response.data.errors);
            //errors: error.response.data.errors;
        });
    }
};

export default {
    state,
    mutations,
    getters,
    actions
};
