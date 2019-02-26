import axios from 'axios';
const http = axios;

export default (Vue, { store }) => {
  http.interceptors.request.use((config) => {
    store.commit("setLoading", true);
    return config;
  }, (error) => {
    // エラー処理
  });

  http.interceptors.response.use((response) => {
    store.commit("setLoading", false);
    return response;
  }, (error) => {
    // エラー処理
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
