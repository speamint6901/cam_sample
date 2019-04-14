import { mapMutations } from 'vuex'
export default {
  methods: {
    ...mapMutations('Search', ['hideModal'])
  }
}
