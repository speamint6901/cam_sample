import * as config from './../../config';
import router from '../../router';

const state = {
    user_status_errors: null,
    want_gear_id: null,
    have_gear_id: null,
    fav_gear_id: null,
    have_count: 0,
    want_count: 0,
    fav_count: 0,
};

const mutations = {
    updateWantToggle: function (state, payload) { state.want_count = payload.want_count  },
    setHaveCount: function (state, payload) { state.have_count = payload },
    setWantCount: function (state, payload) { state.want_count = payload },
    setFavCount: function (state, payload) { state.fav_count = payload },
    user_status_errors (state, errors) {
        console.log(errors);
    }
};


const getters = {
    have_count: function (state) { return state.have_count },
    want_count: function (state) { return state.want_count },
    fav_count: function (state) { return state.fav_count },
    want_gear_id: function (state) { return state.want_gear_id },
};

const actions = {
    toggleWant ({ commit, state }, id, want_count) {
        axios.get(config.toggleWant, {
            gear_id: id,
            notLoading: true,
        }).then(res => {
        }).catch(error => {
            commit('user_status_errors', error);
            router.push({'path': '/login'});
        });
    },
    toggleFav ({ commit, state }, id, fav_count) {
        axios.get(config.toggleFav, {
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
