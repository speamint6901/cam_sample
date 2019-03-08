import Vue from 'vue';
import Vuex from 'vuex';
import App from "./modules/App";
import authUser from "./modules/auth-user";
import UserRegister from './modules/UserRegister.js';
import Login from './modules/Login';


Vue.use(Vuex);

export default new Vuex.Store ({
    modules: {
        App,
        authUser,
        UserRegister,
        Login,
    }
});
