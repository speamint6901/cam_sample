import * as config from './../../config';
import router from '../../router';

const state = {
    user_status_errors: null,
    want_gear_id: null,
    have_gear_id: null,
    fav_gear_id: null,
    want_count: 0,
};

const mutations = {
    updateWantToggle: function (state, payload) { state.want_count = payload.want_count  },
    setWantCount: function (state, payload) { state.want_count = payload },
    user_status_errors (state, errors) {
        console.log(errors);
    }
};


const getters = {
    want_count: function (state) { return state.want_count },
    want_gear_id: function (state) { return state.want_gear_id },
};

const actions = {
    toggleWant ({ commit, state }, id, want_count) {
        axios.get(config.toggleWant, {
            gear_id: id,
            notLoading: true,
        }).then(res => {
            console.log(res.data)
            if (res != undefined) {
                commit('updateWantToggle', res.data.want_count);
            }
        }).catch(error => {
            commit('user_status_errors', error);
            router.push({'path': '/login'});
        });
    },
    setWantCount ({ commit, state }, count) {
        commit('setWantCount', count);
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
};
