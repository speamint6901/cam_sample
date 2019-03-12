const state = {
  modalName: "",
  gear: null,
}

const mutations = {
  setModal (state, payload) {
    state.modalName = payload.name
    state.gear = payload.gear.gear 
  },
  hideModal (state) {
    state.modalName = ''
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

