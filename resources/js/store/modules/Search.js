import * as config from './../../config';
import router from '../../router';

const state = {
    brand_list: [],    
    category_list: [],
    modalName: null,
};

const mutations = {
    setBrandModal (state, payload) {
        state.modalName = payload.name
        state.brand_list = payload.brands
    },
    setCategoryModal (state, payload) {
        state.modalName = payload.name
        state.brand_list = payload.categories
    },
    hideModal (state) {
        state.modalName = ''
        state.brand_list = []
        state.category_list = []
    },
};

const getters = {
};

const actions = {
  setBrandList ({ commit, state }) {
    axios.get(config.getBrandList,{}).then(res => {
        commit('setBrandModal', {name : 'BrandList', brands: res.data.brand})
    }).catch(err => {
    });
  },
  setCategoryList ({ commit, state }) {
    axios.get(config.getCategoryList,{}).then(res => {
        commit('setCategoryModal', {name : 'Category', categories: res.data.category})
    }).catch(err => {
    });
  },
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
};
