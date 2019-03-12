import Vue from 'vue';
import Vuex from 'vuex';
import App from "./modules/App";
import MultiModal from './modules/MultiModal';
import authUser from "./modules/auth-user";
import UserRegister from './modules/UserRegister.js';
import Login from './modules/Login';
import GearStatus from './modules/GearStatus';


Vue.use(Vuex);

export default new Vuex.Store ({
    modules: {
        App,
        MultiModal,
        authUser,
        UserRegister,
        Login,
        GearStatus,
    }
});
