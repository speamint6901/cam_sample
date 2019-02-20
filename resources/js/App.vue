<template>
 <div class="l-Container">
  <page-header></page-header>

  <div class="l-Contents u-SiteSize">
   <router-view></router-view>
  </div>

  <page-footer></page-footer>
 </div><!--//l-Container-->
</template>
 
 
<script>
Vue.component('page-header', require('./components/object/component/Header.vue').default);
Vue.component('page-footer', require('./components/object/component/Footer.vue').default);
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
