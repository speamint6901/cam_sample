import { mapMutations } from 'vuex'
export default {
  methods: {
    ...mapMutations('MultiModal', ['hideModal'])
  }
}
