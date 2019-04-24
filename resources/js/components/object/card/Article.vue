<template>
 <div class="l-Contents_Block">

 <!--通常のArticleCard-->
 <div class="l-Feed">

  <article class="c-ArticleCard" v-for="gear in gears">
   <multi-modal-view :val="gear"></multi-modal-view>
   <header class="c-ArticleCard_Header">
    <router-link v-bind:to="{ name: 'Gear', params : { id: gear.id }}" class="c-GlobalNavi_Menu_Item-Link">
     <figure>
      <img class="c-ArticleCard_Heading-Img u-ObjectFitImg" v-bind:src="'storage/' + gear.gear_image" alt="GearName" />
     </figure>
    </router-link>
   </header>


   <div class="c-ArticleCard_Overview">
    <a class="c-ArticleCard_SubTtile u-Hedding_Card_Sub">
     {{ gear.brand.name }}
    </a><!--//.c-ArticleCard_SubTtile-->
    <h1 class="c-ArticleCard_Title u-Hedding_Card">
     <a href="" class="u-TxtColor_Txt">
     {{ gear.name }}
     </a>
    </h1><!--//.c-ArticleCard_Title-->
   </div><!--//_Overview-->


   <footer class="c-ArticleCard_Footer">
    <div class="c-ArticleCard_Status">
    <have :gear="gear"></have>
    <want :gear="gear"></want>
    <fav :gear="gear"></fav>
    </div>
    <div class="c-ArticleCard_Rating">
     <div class="c-ArticleCard_Rating-Thunder">
      <img class="" :src="'/img/rating/thunder-' + gear.profile.avg_image_name + '.svg'" alt="UserName" />
     </div><!-- /.c-ArticleCard_Rating-Thunder -->
     <p class="c-ArticleCard_Rating-Score u-Text_Main-S">
      {{ gear.profile.thander_avg }} THUNDER
     </p><!--//.c-ArticleCard_Rating-Score-->
    </div>
   </footer>
  </article>


 </div><!--//.l-Feed-->
 <infinite-loading v-if="!initLoadFlag" @infinite="onInfinite" ref="infiniteLoading" :distance="1">
  <span slot="no-more">All products loaded.</span>
 </infinite-loading>


 </div><!-- /.l-Contents_Block -->
</template>

<script>
import { mapState, mapActions, mapMutations } from 'vuex'
import * as config from './../../../config';
import InfiniteLoading from 'vue-infinite-loading';
import MultiModalView from '../modal/MultiModalView.vue'
import Have from './buttons/Have.vue';
import Want from './buttons/Want.vue';
import Fav from './buttons/Fav.vue';

export default {
    components: {
        InfiniteLoading,
        MultiModalView,
        have: Have,
        want: Want,
        fav: Fav
    },
    computed: {
      ...mapState('MultiModal', ['gear']),
      ...mapState('Search', ['gears', 'nextUrl', 'initLoadFlag', 'infiniteLoading', 'onFilter']),
      want_count: {
        get: function () { return this.$store.getters.want_count },
      },
    },
    created() {
        this.$store.commit('Search/setOnFilter', this.onFilter)
        this.$store.commit('setLoading', true);
        this.getInitialGears();
    },
    methods: {
        ...mapActions('Search', ['getInitialGears', 'infinite']),
        ...mapActions('MultiModal', ['showHaveModal']),
        ...mapActions('GearStatus', ['toggleWant','setWantCount']),
        onInfinite() {
            this.$store.commit('Search/infiniteLoading', this.$refs.infiniteLoading)
            this.infinite(this.$refs.infiniteLoading)
        }
    },
}
</script>
