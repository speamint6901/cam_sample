import Vue from 'vue';
import Vuex from 'vuex';
import UserRegister from './modules/UserRegister.js';
import Login from './modules/Login';

Vue.use(Vuex);

export default new Vuex.Store ({
    modules: {
        UserRegister,
        Login
    }
});
