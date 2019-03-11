const state = {
  modalName: "",
  id: null,
}

const mutations = {
  setModal (state, name, id) {
    state.modalName = name
    state.id = id
  },
  hideModal (state) {
    state.modalName = ''
  }
}

const actions = {
  showHaveModal ({ commit }, gear) {
    commit('setModal', {name : 'HaveModal', id: gear.id})
  },
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}

