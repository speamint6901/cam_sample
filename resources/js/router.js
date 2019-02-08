import Vue from 'vue';
import VueRouter from 'vue-router';
 
import Home from './components/pages/Home.vue'
import UserRegister from './components/pages/UserRegister.vue'
import Login from './components/pages/Login.vue'
import User from './components/pages/User.vue'
 
Vue.use(VueRouter);
 
const routes = [
    { path: '/', component: Home },
    { path: '/register', component: UserRegister },
    { path: '/login', component: Login },
    { path: '/user', component: User, meta: { requiresAuth: true } }
];
 
const router = new VueRouter({
    mode: 'history',
    routes
});
 
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (state.isLogin === false) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next();
    }
});
 
export default router;
