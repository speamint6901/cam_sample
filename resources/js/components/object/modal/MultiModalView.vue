<template>
  <transition name="fade">
    <component v-if="isShow" :is="modalName"></component>
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
    props: ['val'],
    computed: {
      ...mapState('MultiModal', ['modalName', 'gear']),
      isShow () {
        return this.modalName !== '' && this.gear.id == this.val
      }
    }
  }
</script>
