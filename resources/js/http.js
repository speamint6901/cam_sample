import axios from 'axios';
const http = axios;

export default (Vue, { store }) => {
  http.interceptors.request.use((config) => {
    if (config.notLoading != undefined && !config.notLoading) {
        store.commit("setLoading", true);
    }
    if (config.data != undefined && config.data.notLoading != undefined && !config.data.notLoading) {
        store.commit("setLoading", true);
    }
    config.headers['X-CSRF-TOKEN']     = window.Laravel.csrfToken;
    config.headers['X-Requested-With'] = 'XMLHttpRequest';
    config.headers['Authorization']    = `Bearer ${localStorage.getItem('jwt_token')}`;
    return config;
  }, (error) => {
    // エラー処理
    return Promise.reject(error);
  });

  http.interceptors.response.use((response) => {
    store.commit("setLoading", false);
    return response;
  }, (error) => {
    // エラー処理
    return error;
  });

  Vue.http = http;
  Object.defineProperties(Vue.prototype, {
    $http: {
      get () {
        return http;
      }
    }
  });
};
