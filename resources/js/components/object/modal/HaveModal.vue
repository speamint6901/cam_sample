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
  import { mapMutations } from 'vuex'
  import MultiModalMixin from '../../../mixins/MultiModalMixin'
  export default {
    name: 'HaveModal',
    mixins: [MultiModalMixin]
  }
</script>
