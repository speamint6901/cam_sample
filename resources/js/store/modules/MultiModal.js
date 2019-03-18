const state = {
  modalName: "",
  gear: null,
  have_count: 0,
  isHave: 0,
  comment: null,
  rating: 0,
  isProcessing: false
}

const getters = {
    gear: state => state.gear,
    have_count: state => state.have_count,
    isHave: state => state.isHave,
    comment: state => state.comment,
    rating: state => state.rating,
    isProcessing: state => state.isProcessing,
}

const mutations = {
  setModal (state, payload) {
    state.modalName = payload.name
    state.gear = payload.gear.gear 
    state.have_count = payload.gear.gear.profile.have_count
    state.isHave = payload.gear.gear.have_user_count
    if (payload.gear.gear.have_users.have_comment != undefined) {
        state.comment = payload.gear.gear.have_users.have_comment
    }
    if (payload.gear.gear.thander_users.point != undefined) {
        state.comment = payload.gear.gear.thander_users.point
    }
  },
  hideModal (state) {
    state.modalName = ''
  },
  setProcessing (state, payload) {
    state.isProcessing = payload
  },
  setResponseHaveData (state, payload) {

  }
}

const actions = {
  showHaveModal ({ commit }, gear) {
    commit('setModal', {name : 'HaveModal', gear: gear})
  },
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}

