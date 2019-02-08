const state = {
    isError: false,
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


const getters = {};


const actions = {
    register ({ commit }, formData) {
        console.log(formData);
        axios.post('/api/register', {
            email: formData.email,
            name: formData.name,
            password: formData.password,
            password_confirmation: formData.password_confirmation
        }).then(res => {
            commit('register', res.data);
            console.log(res);
        }).catch(error => {
            console.log(error);
        });
    }
};

export default {
    state,
    mutations,
    getters,
    actions
};
