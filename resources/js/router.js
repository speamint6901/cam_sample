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
import Privacy from './components/pages/Privacy.vue'
import Terms from './components/pages/Terms.vue'


Vue.use(VueRouter);
 
const routes = [
    { path: '/', component: Home, meta: {title: 'Home'}},
    { path: '/privacy', component: Privacy, meta: {title: 'プライバシーポリシー'} },
    { path: '/terms', component: Terms, meta: {title: '利用規約'} },
    { path: '/register', component: UserRegister, meta: {title: '新規登録'} },
    { path: '/register/complete', component: UserRegisterComp, meta: {title: '新規登録'} },
    { path: '/login', component: Login, meta: {title: 'ログイン'} },
    { path: '/gear/:id', name: 'Gear', component: Gear, props: true },
    { path: '/logout', name: 'logout', component: Logout },
    { path: '/user', component: User, meta: { requiresAuth: true } }
];
 
const router = new VueRouter({
    mode: 'history',
    routes
});

const nextAuth = (to, from, next) => {
  // 認証が必要なページでログイン情報が無ければリダイレクト
  store.commit('setLoading', false);
  if (store.getters.authenticated) {
    next()
  } else {
    next({
      path: '/login',
    })
  }
}
 
router.beforeEach((to, from, next) => {
    store.commit('setLoading', true);
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.init !== true) {
            const unwatch = store.watch(() => store.getters.init, n => {
                console.log('unw' + n)
                unwatch()
                nextAuth(to, from, next)
            })
        } else {
            store.commit('setLoading', false);
            nextAuth(to, from, next)
        }
    } else {
        store.commit('setLoading', false);
        next();
    }
});

router.afterEach(() => {
  store.commit('setLoading', false)
})
 
export default router;
