<template>
  <div class="modal">
    <div class="modal__bg"></div>
    <div class="modal__content">
      <p>Have</p>
      <button @click="hideModal">closeModal</button>
    </div>
  </div>
</template>

<script>
  import { mapState, mapMutations } from 'vuex'
  import MultiModalMixin from '../../../mixins/MultiModalMixin'
  export default {
    name: 'HaveModal',
    computed: {
        ...mapState('MultiModal', ['gear'])
    },
    mixins: [MultiModalMixin],
  }
</script>
