import * as config from './../../config';
import router from '../../router';

const state = {
  modalName: "",
  gear: null,
  have_count: 0,
  isHave: 0,
  have_comment: null,
  have_rating: 0,
  isProcessing: false,
  after_have_count: 0,
  current_gear_id: null,
}

const mutations = {
  setModal (state, payload) {
    state.modalName = payload.name
    state.gear = payload.gear.gear 
  },
  hideModal (state) {
    state.modalName = ''
  },
  setProcessing (state, payload) {
    state.isProcessing = payload
  },
  have_comment (state, payload) {
    state.have_comment = payload
  },
  have_rating (state, payload) {
    state.rating = payload
  },
  setAfterHaveCount (state, payload) {
    state.after_have_count = payload.count
    state.current_gear_id = payload.gear_id
  },
}

const actions = {
  showHaveModal ({ commit }, gear) {
    if (this.state.authUser.authenticated == false) {
        router.push({'path': '/login'});
    } else {
        commit('setModal', {name : 'HaveModal', gear: gear})
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
        commit('setAfterHaveCount', { gear_id: formData.gear_id, count: res.data.count })
    }).catch(error => {
        console.log(error)
    });
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}

