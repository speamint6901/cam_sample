import * as config from './../../config';

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

/*
const getters = {
    have_gear: state => state.have_gear,
    have_count: state => state.have_count,
    isHave: state => state.isHave,
    have_comment: state => state.have_comment,
    have_rating: state => state.have_rating,
    isProcessing: state => state.isProcessing,
}
*/

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
  /*
  setResponseHaveData (state, payload) {

  }
  */
}

const actions = {
  showHaveModal ({ commit }, gear) {
    commit('setModal', {name : 'HaveModal', gear: gear})
  },
  setAfterHaveCount ({ commit }, {gear_id, count}) {
    commit('setAfterHaveCount', { gear_id: gear_id, count: count })
  },
  toggleHave ({ commit, state }) {
    console.log(state)
    return new Promise((resolve, reject) => {
        axios.post(config.toggleHave, {
            rating: state.rating,
            comment: state.rating,
            count: state.have_count,
        }).then(res => {
            resolve();
        }).catch(error => {
            reject(); 
        });
    })
  },
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}

