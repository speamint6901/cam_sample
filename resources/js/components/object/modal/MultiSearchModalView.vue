<template>
  <transition name="fade">
    <component v-if="isShow" :is="modalName"></component>
  </transition>
</template>

<script>
  import { mapState } from 'vuex'
  import BrandList from './BrandList.vue'
  import Category from './Category.vue'

  export default {
    components: {
        BrandList,
        Category
    },
    computed: {
      ...mapState('Search', ['modalName']),
      isShow () {
        return this.modalName !== ''
      }
    }
  }
</script>
