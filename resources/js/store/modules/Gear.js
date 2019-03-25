import * as config from './../../config';
import router from '../../router';

const state = {
    gear_detail: null,    
};

const mutations = {
    setGearDetail (state, payload) {
        state.gear_detail = payload;
    }
};


const getters = {
    gear_detail: function (state) { return state.gear_detail }
};

const actions = {
    showGearDetail ({ commit, state }, id) {
        commit('setLoading', true);
        var url = config.getDetail + '?id=' + id;
        axios.get(url, {}).then(res => {
            commit('setGearDetail', res.data.gear);
            commit('setLoading', false);
        }).catch(err => {

        });
    },
};

export default {
    state,
    mutations,
    getters,
    actions
};
