<template>
  <transition name="fade">
    <component v-if="isShow && val.id == id" :is="modalName"></component>
  </transition>
</template>

<script>
  import { mapState } from 'vuex'
  import HaveModal from './HaveModal.vue'

  export default {
    name: 'MultiModalView',
    components: {
        HaveModal
    },
    computed: {
      ...mapState('MultiModal', ['modalName', 'id']),
      isShow () {
        return this.modalName !== ''
      }
    }
  }
</script>
