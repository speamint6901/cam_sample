<template>
 <div class="l-Container">
  <page-header></page-header>

  <div v-show="isLoading" class="c-Loader05">Loading..</div>
  <div class="l-Contents u-SiteSize" v-show="!isLoading">
   <router-view></router-view>
  </div>

  <page-footer></page-footer>
 </div><!--//l-Container-->
</template>
 
 
<script>
Vue.component('page-header', require('./components/object/component/Header.vue').default);
Vue.component('page-footer', require('./components/object/component/Footer.vue').default);

export default {
    created() {
        this.$store.dispatch('setAuthUser')
    },
    computed: {
        isLoading: {
            get: function () { return this.$store.getters.isLoading }
        }
    }
}
</script>
