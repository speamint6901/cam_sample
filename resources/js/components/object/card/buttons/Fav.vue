<template>
<div class="c-ArticleCard_Status_Item">
 <i class="c-ArticleCard_Status-Icon">C.</i>
 <span class="c-ArticleCard_Status-Count">{{ fav_count }}</span>
</div>
</template>

<script>
import { mapState, mapActions, mapMutations } from 'vuex'

export default {
    name: 'GearStatus',
    props: ['gear'],
    data: function() {
        return {
            fav_count: this.gear.profile.fav_count
        }
    },
    methods: {
        toggleFav() {
            
        }
    }
}
</script>
