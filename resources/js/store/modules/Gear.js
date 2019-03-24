import * as config from './../../config';
import router from '../../router';

const state = {
    gear_detail: null,    
};

const mutations = {
};


const getters = {
    have_count: function (state) { return state.have_count },
    want_count: function (state) { return state.want_count },
    fav_count: function (state) { return state.fav_count },
    want_gear_id: function (state) { return state.want_gear_id },
};

const actions = {
    showGearDetail ({ commit, state }, id) {
        var url = config.getDetail + '?id=' + id;
        axios.get(url, {}).then(res => {
            console.log(res);
        }).catch(err => {

        });
    },
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
