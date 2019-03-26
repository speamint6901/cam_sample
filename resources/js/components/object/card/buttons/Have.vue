<template>
 <div class="c-ArticleCard_Status_Item" @click="showHaveModal({gear: gear})">
  <i class="c-ArticleCard_Status-Icon">H<span class="p-MasterItem-Only">AVE</span>.</i>
  <span class="c-ArticleCard_Status-Count">{{ updateHaveCount }}</span>
 </div>
</template>

<script>
import { mapState, mapActions, mapMutations } from 'vuex'

export default {
    props: ['gear'],
    data: function() {
        return {
            have_count: null
        }
    },
    created () {
        this.have_count = this.gear.profile.have_count
    },
    computed: {
        ...mapState('MultiModal', ['after_have_count', 'current_gear_id', 'have_button_process']),
        updateHaveCount () {
            if (this.current_gear_id == this.gear.id) {
                return this.have_count = this.after_have_count
            } else {
                return this.have_count
            }
        }
    },
    methods: {
        ...mapActions('MultiModal', ['showHaveModal']),
    }
}
</script>
