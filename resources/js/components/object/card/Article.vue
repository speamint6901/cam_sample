<template>
 <div class="l-Contents_Block">

 <!--通常のArticleCard-->
 <div class="l-Feed">

  <article class="c-ArticleCard" v-for="gear in gears">

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
     <ul class="c-ArticleCard_Status_Wrap">
      <li class="c-ArticleCard_Status_Item">
       <i class="c-ArticleCard_Status-Icon">H.</i>
       <span class="c-ArticleCard_Status-Count">888T</span>
      </li>
      <li class="c-ArticleCard_Status_Item">
       <i class="c-ArticleCard_Status-Icon">W.</i>
       <span class="c-ArticleCard_Status-Count">888T</span>
      </li>
      <li class="c-ArticleCard_Status_Item">
       <i class="c-ArticleCard_Status-Icon">C.</i>
       <span class="c-ArticleCard_Status-Count">888T</span>
      </li>
     </ul>
    </div><!-- /.c-ArticleCard_Status -->

    <div class="c-ArticleCard_Rating">
     <div class="c-ArticleCard_Rating-Thunder">
      <img class="" src="/img/Dummt_Thunder.svg" alt="UserName" />
     </div><!-- /.c-ArticleCard_Rating-Thunder -->
     <p class="c-ArticleCard_Rating-Score u-Text_Main-S">
      3.4 THUNDER
     </p><!--//.c-ArticleCard_Rating-Score-->
    </div>
   </footer>
  </article>
 </div><!--//.l-Feed-->


 <infinite-loading @infinite="onInfinite" ref="infiniteLoading" :distance="500">
  <span slot="no-more">End of content</span>
 </infinite-loading>

 </div><!-- /.l-Contents_Block -->
</template>

<script>
import * as config from './../../../config';
import InfiniteLoading from 'vue-infinite-loading';

export default {
    components: {
        InfiniteLoading,
    },
    data() {
        return {
            gears:[],
            nextUrl: config.getList
        }
    },
    created() {
        axios.get(this.nextUrl).then(res => {
           this.gears = res.data.data;
           this.nextUrl = res.data.next_page_url;
        });
    },
    methods: {
        onInfinite() {
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
    },
}
</script>
