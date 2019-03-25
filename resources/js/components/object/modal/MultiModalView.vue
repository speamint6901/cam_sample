<template>
  <transition name="fade">
    <component v-if="isShow" :is="modalName" :gear="val"></component>
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
      ...mapState('MultiModal', ['modalName', 'have_gear']),
      isShow () {
        return this.modalName !== '' && this.have_gear.id == this.val.id
      }
    }
  }
</script>
