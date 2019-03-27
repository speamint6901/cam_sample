<template>
  <div class="l-Contents_Block">
   <!--UserComment-->
   <article class="c-UserFeed-Comment" v-for="have_comment in have_comments">
    <div class="c-UserFeed-Comment_Block-UserInfo">

     <div class="c-UserFeed-Comment_UserIcon">
      <div class="c-UserIcon_Thumb">
       <a href="">
        <img class="c-UserIcon_Thumb-Img u-ObjectFitImg" src="/img/user01.png" alt="UserName" />
       </a>
      </div><!--//.c-UserIcon_Thumb-->
      <p class="c-UserIcon_Name u-Text_Main-XS">UserName</p><!--//.c-UserIcon_Name-->
     </div><!--//.Comment_UserIcon-->

     <div class="c-UserFeed-Comment_Rating">
      <div class="c-UserFeed-Comment_Rating-Thunder">
       <img class="" src="/img/Dummt_Thunder.svg" alt="UserName" />
      </div><!-- /.c-UserFeed-Comment_Rating-Thunder -->
      <p class="c-ArticleCard_Rating-Score u-Text_Main-S">
       3.4 THUNDER
      </p><!--//.c-ArticleCard_Rating-Score-->
     </div><!--//Comment_Rating-->

    </div><!-- /.c-UserFeed-Comment_Block -->

    <div class="c-UserFeed-Comment_Block-Text"><p>{{ have_comment.have_comment }}</p>
     <time :datetime="have_comment.updated_at">Date : {{ have_comment.updated_at }}</time>
    </div><!-- /.c-UserFeed-Comment_Block-Text -->
   </article><!--//.c-UserFeed-Comment-->
   <infinite-loading v-if="!initLoadFlag" @infinite="onInfinite" ref="infiniteLoading" :distance="1">
    <span slot="no-more">All products loaded.</span>
   </infinite-loading>
  </div><!-- /.l-Contents_Block -->

</template>

<script>
import { mapState, mapMutations } from 'vuex'
import * as config from './../../../config';
import InfiniteLoading from 'vue-infinite-loading';

export default {
    components: {
        InfiniteLoading,
    },
    data () {
        return {
            initLoadFlag: true,
            asset_domain: config.assetDomain,
            nextUrl: config.getComments + '?gear_id=' + this.$route.params.id,
            have_comments:[]
        }
    },
    created() {
        this.$store.commit('setLoading', true);
        axios.get(this.nextUrl, {notLoading: true}).then(res => {
           if (res.data.data.length) {
               console.log(res);
               this.have_comments = res.data.data;
               this.nextUrl = res.data.next_page_url;
               this.initLoadFlag = false;
               this.$store.commit('setLoading', false);
           } else {
               return;
           }
        })
    },
    methods: {
        onInfinite() {
            if (this.nextUrl == null) {
                this.$refs.infiniteLoading.stateChanger.complete();
                return;
            }
            axios.get(this.nextUrl, {
                    notLoading: true
                }).then(res => {
                if (res.data.data.length) {
                    this.have_comments = this.gears.concat(res.data.data);
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
    }
}
</script>
