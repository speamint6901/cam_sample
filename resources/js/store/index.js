import Vue from 'vue';
import Vuex from 'vuex';
import App from "./modules/App";
import AuthUser from "./modules/auth-user";
import UserRegister from './modules/UserRegister.js';
import Login from './modules/Login';

Vue.use(Vuex);

export default new Vuex.Store ({
    modules: {
        App,
        AuthUser,
        UserRegister,
        Login
    }
});
