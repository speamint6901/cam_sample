<template>
  <div class="c-ArticleCard_Status">
   <ul class="c-ArticleCard_Status_Wrap">
    <li class="c-ArticleCard_Status_Item">
     <i class="c-ArticleCard_Status-Icon">H.</i>
     <span class="c-ArticleCard_Status-Count" @click="showHaveModal({gear: gear})">{{ have_count }}</span>
    </li>
    <li class="c-ArticleCard_Status_Item">
     <i class="c-ArticleCard_Status-Icon">W.</i>
     <span class="c-ArticleCard_Status-Count" @click="toggleWant({ id : gear.id, want_count: want_count })">{{ want_count }}</span>
    </li>
    <li class="c-ArticleCard_Status_Item">
     <i class="c-ArticleCard_Status-Icon">C.</i>
     <span class="c-ArticleCard_Status-Count">{{ fav_count }}</span>
    </li>
   </ul>
  </div><!-- /.c-ArticleCard_Status -->
</template>

<script>
import { mapState, mapActions, mapMutations } from 'vuex'

export default {
    name: 'GearStatus',
    props: ['gear'],
    computed: {
        want_count: {
            get: function () { return this.$store.getters.want_count },
            set: function (val) { this.$store.GearStatus.commit('setWantCount', val) }
        }
    },
    created() {
       console.log(this.gear)
       this.want_count = this.gear.profile.want_count 
    },
    methods: {
        ...mapActions('MultiModal', ['showHaveModal']),
        ...mapActions('GearStatus', ['toggleWant','setWantCount'])
    }
}
</script>
