import * as config from './../../config';
import router from '../../router';

const state = {
    gear_detail: null,    
    gear_comment_count: 0,
};

const mutations = {
    setGearDetail (state, payload) {
        state.gear_detail = payload;
    },
    setCommentCount (state, payload) {
        state.gear_comment_count = payload
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
            commit('setCommentCount', res.data.comment_count);
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
