import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';
import jwt from './localStorage.js';
 
import Home from './components/pages/Home.vue'
import UserRegister from './components/pages/UserRegister.vue'
import UserRegisterComp from './components/pages/UserRegisterComp.vue'
import Login from './components/pages/Login.vue'
import Logout from './components/pages/Logout.vue'
import User from './components/pages/User.vue'
import Gear from './components/pages/Gear.vue'


Vue.use(VueRouter);
 
const routes = [
    { path: '/', component: Home },
    { path: '/register', component: UserRegister },
    { path: '/register/complete', component: UserRegisterComp },
    { path: '/login', component: Login },
    { path: '/gear', component: Gear },
    { path: '/logout', name: 'logout', component: Logout },
    { path: '/user', component: User, meta: { requiresAuth: true } }
];
 
const router = new VueRouter({
    mode: 'history',
    routes
});
 
router.beforeEach((to, from, next) => {
    store.commit('setLoading', true);
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.state.AuthUser.authenticated === false || !jwt.getToken()) {
            next({
                path: '/login',
            })
        } else {
            next()
        }
    } else {
        next();
    }
});

router.afterEach(() => {
  store.commit('setLoading', false)
})
 
export default router;
