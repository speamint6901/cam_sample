import * as config from './../../config';
import router from '../../router';

const state = {
    brand_list: [],    
    category_list: [],
    modalName: null,
    gears: [],
    nextUrl: config.getList,
    initLoadFlag: true,
    infiniteLoading: null,
    onFilter: 0,
    onSort: 0,
    filter: {
        brand_id: null,
        category_type: 0,
        category_id: null,
        keyword: null,
        keyword_type: 1,
    },
    sort: {
        type: 'created_at',
        sorting: 'desc',
    }
};

const mutations = {
    setInitialLoad (state, payload) {
        state.gears = state.gears.concat(payload.data.data);
        state.nextUrl = payload.data.next_page_url;
        state.initLoadFlag = false;
    },
    unsetGears (state) {
        state.gears = [];
        state.nextUrl = config.getList;
    },
    setKeywordType (state, payload) {
        state.filter.keyword_type = payload
    },
    setKeyword (state, payload) {
        state.filter.keyword = payload
    },
    setBrandId(state, payload) {
        state.filter.brand_id = payload
    },
    setCategoryInfo(state, payload) {
        state.filter.category_type = payload.category_type
        state.filter.category_id = payload.category_id
    },
    setOnFilter (state, payload) {
        state.onFilter = payload
    },
    setSearchModal (state, payload) {
        state.modalName = payload
    },
    setBrandList (state, payload) {
        state.brand_list = payload
    },
    setCategoryList (state, payload) {
        state.category_list = payload
    },
    hideModal (state) {
        state.modalName = ''
        state.brand_list = []
        state.category_list = []
    },
    infiniteLoading (state, payload) {
        state.infiniteLoading = payload;
    },
};

const getters = {
};

const actions = {
  getInitialGears ({ commit, state }) {
      commit('unsetGears')
      axios.get(state.nextUrl, 
         { params: {onFilter: state.onFilter, filter: state.filter, sort: state.sort, notLoading: true} }).then(res => {
         commit('setInitialLoad', res)
         commit('setLoading', false, { root: true });
      })
  },
  infinite ({ commit, state }) {
      if (state.nextUrl == null) {
         state.infiniteLoading.stateChanger.complete();
      }
      axios.get(state.nextUrl, 
         { params: {onFilter: state.onFilter, filter: state.filter, sort: state.sort, notLoading: true} }).then(res => {
         if (res.data.data.length) {
             state.infiniteLoading.stateChanger.loaded();
             //現在のページ と 最後のページが同一なら終了
             if (res.data.current_page == res.data.last_page) {
                 state.infiniteLoading.stateChanger.complete();
             }
         } else {
             state.infiniteLoading.stateChanger.complete();
         }
         commit('setInitialLoad', res)
         commit('setLoading', false, { root: true });
      }).catch((error) => {
            console.log(error);
      });
  },
  setBrandList ({ commit, state }) {
    commit('setSearchModal', 'BrandList')
    axios.get(config.getBrandList,{}).then(res => {
        console.log(res.data);
        commit('setBrandList', res.data)
        commit('setLoading', false, { root : true })
    }).catch(err => {
    });
  },
  setCategoryList ({ commit, state }) {
    commit('setSearchModal', 'Category')
    axios.get(config.getCategoryList,{}).then(res => {
        commit('setCategoryList', res.data)
        commit('setLoading', false, { root : true })
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
