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
      <img class="" src="/img/Dummt_Thunder.svg" alt="UserName" />
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
    data() {
        return {
            initLoadFlag: true,
            gears:[],
            nextUrl: config.getList
        }
    },
    computed: {
      ...mapState('MultiModal', ['gear']),
      want_count: {
        get: function () { return this.$store.getters.want_count },
      },
    },
    created() {
        this.$store.commit('setLoading', true);
        axios.get(this.nextUrl, {notLoading: true}).then(res => {
           this.gears = res.data.data;
           this.nextUrl = res.data.next_page_url;
           this.initLoadFlag = false;
           this.$store.commit('setLoading', false);
        })
    },
    methods: {
        onInfinite() {
            if (this.nextUrl == null) {
                this.$refs.infiniteLoading.stateChanger.complete();
            }
            axios.get(this.nextUrl, {
                    notLoading: true
                }).then(res => {
                if (res.data.data.length) {
                    this.gears = this.gears.concat(res.data.data);
                    this.$refs.infiniteLoading.stateChanger.loaded();
                    this.nextUrl = res.data.next_page_url;
                    //現在のページ と 最後のページが同一なら終了
                    if (res.data.current_page == res.data.last_page) {
                        this.$refs.infiniteLoading.stateChanger.complete();
                    }
                } else {
                    this.$refs.infiniteLoading.stateChanger.complete();
                }
            }).catch((error) => {
                console.log(error);
            });
        },
        ...mapActions('MultiModal', ['showHaveModal']),
        ...mapActions('GearStatus', ['toggleWant','setWantCount'])
    },
}
</script>
