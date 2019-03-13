<template>
  <div class="c-ArticleCard_Status_Item" @click="showHaveModal({gear: gear})">
    <i class="c-ArticleCard_Status-Icon">H.</i>
    <span class="c-ArticleCard_Status-Count" >{{ have_count }}</span>
  </div>
</template>

<script>
import { mapState, mapActions, mapMutations } from 'vuex'

export default {
    //name: 'GearStatus',
    props: ['gear'],
    data: function() {
        return {
            have_count: this.gear.profile.have_count
        }
    },
    methods: {
        ...mapActions('MultiModal', ['showHaveModal']),
    }
}
</script>
