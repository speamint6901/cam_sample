<template>

 <article v-if="gear_detail != null" class="c-MasterItem">


  <div class="l-Contents_Block">
   <nav class="u-Flex _Justify-Center _AlignItem-Center u-Margin _mgTop-base06 _mgBottom-base06">
    <p class="u-Margin _mgRight-base04 u-TxAlign-Center">COMMENT<span class="u-Block">{{ gear_comment_count }}</span></p>
   </nav>
  </div><!-- /.l-Contents_Block -->


  <div class="l-Contents_Block">

   <div class="c-MasterItem_MainBlock">
    <figure class="c-MasterItem_MainVisual">
     <img class="c-MasterItem_MainVisual-Img u-ObjectFitImg" v-bind:src="asset_domain + 'storage/' + gear_detail.gear_image" alt="GearName" />
     <figcaption class="u-Flex u-Text_Main-XS u-TextOverflow c-MasterItem_MainVisual-Img_Caption">
     Source:
      <blockquote class="u-Margin _mgLeft-base01" v-show="gear_detail.site_url">{{ gear_detail.site_url }}</blockquote>
     </figcaption>
    </figure><!-- /.c-MasterItem_MainVisual -->
    <div class="c-MasterItem_MainOverview">
     <a class="c-MasterItem_MainOverview_SubTtile">{{ gear_detail.brand.name }}</a><!--//.c-MasterItem_MainOverview_SubTtile-->
     <h1 class="c-MasterItem_MainOverview_Title u-Text_MasterItem-Title">{{ gear_detail.name }}</h1><!--//.c-MasterItem_MainOverview_Title-->

    <div class="c-ArticleCard_Status">
    <have :gear="gear_detail"></have>
    <want :gear="gear_detail"></want>
    <fav :gear="gear_detail"></fav>
    </div>

     <div class="c-MasterItem_MainRating">
      <div class="c-MasterItem_MainRating-Thunder">
       <img class="" :src="'/img/rating/thunder-' + replaceThander(gear_detail.profile.thander_avg) + '.svg'" alt="" />
      </div><!-- /.c-MasterItem_Main_Rating-Thunder -->
      <p class="c-MasterItem_MainRating-Score u-Text">
       {{ gear_detail.profile.thander_avg }} THUNDER
      </p><!--//.c-MasterItem_MainRating-Score-->
     </div><!--//.c-MasterItem_MainRating-->

     <div class="c-MasterItem_MainInfo">
      <p class="c-MasterItem_MainInfo-Discription">
        {{ gear_detail.discription }}
      </p>
     </div><!--//.c-MasterItem_MainInfo-->
     <ul class="c-MasterItem_Category" v-if="this.gear_detail.genre != null">
      <li class="c-MasterItem_Category_Label"><a href="#" @click.prevent.stop="doCategorySearch({ category_type: 1, category_id: gear_detail.genre.category.big_category.id })" class="u-TxtColor_Main">
      {{ gear_detail.genre.category.big_category.name }}
      </a></li>
      <li class="c-MasterItem_Category_Label"><a href="#" @click.prevent.stop="doCategorySearch({ category_type: 2, category_id: gear_detail.genre.category.id })" class="u-TxtColor_Main">
      {{ gear_detail.genre.category.name }}
      </a></li>
      <li class="c-MasterItem_Category_Label"><a href="#" @click.prevent.stop="doCategorySearch({ category_type: 3, category_id: gear_detail.genre.id })" class="u-TxtColor_Main">
      {{ gear_detail.genre.name }}
      </a></li>
     </ul><!-- /.c-MasterItem_Category -->
     <ul v-else class="c-MasterItem_Category">
      <li class="c-MasterItem_Category_Label"><a href="#" @click.prevent.stop="doCategorySearch({ category_type: 1, category_id: gear_detail.category[0].big_category.id })" class="u-TxtColor_Main">
      {{ gear_detail.category[0].big_category.name }}
      </a></li>
      <li class="c-MasterItem_Category_Label"><a href="#" @click.prevent.stop="doCategorySearch({ category_type: 2, category_id: gear_detail.category[0].id })" class="u-TxtColor_Main">
      {{ gear_detail.category[0].name }}
      </a></li>
     </ul>

     <ul class="c-MasterItem_SNSshare">
      <li class="c-MasterItem_SNSshare_Item">
       <a :href="'http://www.facebook.com/share.php?u=' + asset_domain + 'gear/' + gear_detail.id" rel="nofollow" target="_blank" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-Facebook.svg" alt="facebook" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a :href="'https://twitter.com/share?url=' + asset_domain + 'gear/' + gear_detail.id + '&via=Campbug_Outdoor&text=Campbug:' + gear_detail.name" rel="nofollow" target="_blank">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-Twitter.svg" alt="Twitter" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a data-pin-do="buttonBookmark" data-pin-lang="ja" href="https://jp.pinterest.com/pin/create/button/" class="c-MasterItem_SNSshare_Item-Link" target="_blank">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-pintarest.svg" alt="pintarest" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a :href="'http://getpocket.com/edit?url=' + asset_domain + 'gear/' + gear_detail.id + '&title=' + gear_detail.name" rel="nofollow" target="_blank" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-poket.svg" alt="poket" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a :href="'https://social-plugins.line.me/lineit/share?url=' + asset_domain + 'gear/' + gear_detail.id" target="_blank" rel="nofollow" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-line.svg" alt="LINE" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a :href="'http://b.hatena.ne.jp/add?mode=confirm&url=' + asset_domain + 'gear/' + gear_detail.id + '&title=' + gear_detail.name" target="_blank" rel="nofollow" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-hatebu.svg" alt="hatebu" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a :href="'https://feedly.com/i/subscription/feed/' + asset_domain + 'gear/' + gear_detail.id" target="_blank" rel="nofollow" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-feedly.svg" alt="feedly" />
        </i>
       </a>
      </li>
     </ul><!-- /.c-MasterItem_SNSshare -->

     <div class="c-MasterItem_ProductLink">
      <a href="" class="c-MasterItem_ProductLink_Btn -Amazon">Amazon</a>
      <a href="" class="c-MasterItem_ProductLink_Btn -Rakuten">楽天市場</a>
      <a href="" class="c-MasterItem_ProductLink_Btn -Yahoo">Yahooショッピング</a>
     </div><!-- /.c-MasterItem_ProductLink -->

    </div><!-- /.c-MasterItem_MainOverview -->
   </div><!-- /.c-MasterItem_MainBlock -->

  </div><!-- /.l-Contents_Block -->


  <div class="l-Contents_Block">
  </div><!-- /.l-Contents_Block -->

  <have-comment></have-comment>

 </article><!--//.c-MasterItem-->

</template>

<script>
import router from './../../router';
import { mapState, mapMutations, mapActions } from 'vuex'
import * as config from './../../config';
import HaveComment from '../object/card/HaveComment.vue';
import Have from '../object/card/buttons/Have.vue';
import Want from '../object/card/buttons/Want.vue';
import Fav from '../object/card/buttons/Fav.vue';

export default {
    components: {
        'have-comment': HaveComment,
        have: Have,
        want: Want,
        fav: Fav
    },
    props: ['id'],
    data () {
        return {
            asset_domain: config.assetDomain
        }
    },
    computed: {
        gear_detail: {
            get () { return this.$store.state.Gear.gear_detail }
        },
        gear_comment_count: {
            get () { return this.$store.state.Gear.gear_comment_count }
        }
    },
    created() {
        this.$store.commit('setGearDetail', null);
        this.$store.dispatch('showGearDetail', this.id)
    },
    methods: {
        ...mapActions('Search', ['getInitialGears']),
        replaceThander(val) {
           var a = String(val);
           return a.replace('.', '-');
        },
        doCategorySearch(category_info) {
            console.log(category_info)
            this.$store.commit('setLoading', true)
            this.$store.commit('Search/setOnFilter', 1)
            this.$store.commit('Search/setCategoryInfo', category_info)
            this.getInitialGears();
            router.push({'path': '/'});
        }
    }
}
</script>
