<template id="">
 <div>
  <page-header></page-header>
  <router-view></router-view>
 </div>
</template>
 
 
<script>
Vue.component('page-header', require('./components/partial/Header.vue').default);
/*
    export default {
        methods: {
            logout() {
                axios.get('/api/logout').then(res => {
                    state.isLogin = false;
                    this.$router.push({path: '/'});
                });
            }
        }
    }
*/
</script>
