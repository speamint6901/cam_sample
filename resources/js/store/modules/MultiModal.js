import * as config from './../../config';
import router from '../../router';

const state = {
  modalName: "",
  have_gear: null,
  have_count: 0,
  isHave: 0,
  have_comment: null,
  have_rating: 0,
  have_type: null,
  isProcessing: false,
  after_have_count: 0,
  current_gear_id: null,
}

const getters = {
  isHave: function (state) { return state.isHave }
}

const mutations = {
  setModal (state, payload) {
    state.modalName = payload.name
    state.have_gear = payload.gear 
    state.isHave = payload.gear.have_users_count
    state.have_count = payload.gear.profile.have_count
  },
  updateRatingForm (state, payload) {
    state.have_rating = payload;
    console.log(state)
  },
  updateCommentForm (state, payload) {
    state.have_comment = payload;
    console.log(state)
  },
  setCurrentGear (state, payload) {
    state.current_gear = payload
  },
  setHaveType (state, payload) {
    state.have_type = payload
  },
  setIsProcessing (state, payload) {
    state.isProcessing = payload
  },
  hideModal (state) {
    state.modalName = ''
    state.have_rating = 0
    state.have_comment = null
  },
  setAfterHaveCount (state, payload) {
    state.after_have_count = payload.data.count
    state.current_gear_id = payload.gear_id
    state.have_rating = 0
    state.have_comment = null
  },
}

const actions = {
  showHaveModal ({ commit }, gear) {
    console.log(this.state.authUser.authenticated)
    if (this.state.authUser.authenticated == false || this.state.authUser.authenticated == undefined) {
        router.push({'path': '/login'});
    } else {
        var url = config.haveModalGear + '?gear_id=' + gear.gear.id;
        axios.get(url,{}).then(res => {
            commit('setModal', {name : 'HaveModal', gear: res.data.gear})
            if (res.data.gear.have_users.length) {
                commit('updateCommentForm', res.data.gear.have_users[0].pivot.have_comment)
                commit('updateRatingForm', res.data.gear.have_users[0].pivot.point)
            }
        }).catch(err => {
 
        });
    }
  },
  toggleHave ({ commit, state }, formData) {
    axios.post(config.toggleHave, {
        gear_id: formData.gear_id,
        rating: formData.rating,
        comment: formData.comment,
        count: formData.count,
        type: formData.type,
    }).then(res => {
        console.log(res)
        commit('setAfterHaveCount', { gear_id: formData.gear_id, data: res.data })
    }).catch(error => {
        console.log(error)
    });
  },
  toggleTypeChange({ commit, state}, type) {
       commit('setHaveType', type);
  },
  changeIsProcessing({ commit, state }, process) {
       commit('setIsProcessing', process)
  },
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}

