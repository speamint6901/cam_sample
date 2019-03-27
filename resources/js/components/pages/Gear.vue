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
     <figcaption class="u-Flex u-Text_Main-XS u-Margin _mgTop-base02">
     Source:
      <blockquote class="u-Margin _mgLeft-base01" v-show="gear_detail.site_url">{{ gear_detail.site_url }}</blockquote>
     </figcaption>
    </figure><!-- /.c-MasterItem_MainVisual -->
    <div class="c-MasterItem_MainOverview">
     <a class="c-MasterItem_MainOverview_SubTtile">{{ gear_detail.brand.name }}</a><!--//.c-MasterItem_MainOverview_SubTtile-->
     <h1 class="c-MasterItem_MainOverview_Title u-Text_MasterItem-Title">{{ gear_detail.name }}</h1><!--//.c-MasterItem_MainOverview_Title-->

     <div class="c-MasterItem_MainStatus">
      <ul class="c-MasterItem_MainStatus_Wrap">
       <li class="c-MasterItem_MainStatus_Item -Active">
        <i class="c-MasterItem_MainStatus_Item-Icon">
         HAVE.
         <span class="c-MasterItem_MainStatus_Item-Count">888T</span>
        </i>
       </li>

       <li class="c-MasterItem_MainStatus_Item">
        <i class="c-MasterItem_MainStatus_Item-Icon">
         WANT.
         <span class="c-MasterItem_MainStatus_Item-Count">888T</span>
        </i>
       </li>

       <li class="c-MasterItem_MainStatus_Item">
        <i class="c-MasterItem_MainStatus_Item-Icon">
         FAVORITE.
         <span class="c-MasterItem_MainStatus_Item-Count">888T</span>
        </i>
       </li>
      </ul>
     </div><!-- /.c-MasterItem_MainStatus -->

     <div class="c-MasterItem_MainRating">
      <div class="c-MasterItem_MainRating-Thunder">
       <img class="" src="/img/Dummt_Thunder.svg" alt="UserName" />
      </div><!-- /.c-MasterItem_Main_Rating-Thunder -->
      <p class="c-MasterItem_MainRating-Score u-Text">
       3.4 THUNDER
      </p><!--//.c-MasterItem_MainRating-Score-->
     </div><!--//.c-MasterItem_MainRating-->

     <div class="c-MasterItem_MainInfo">
      <p>
        {{ gear_detail.discription }}
      </p>
     </div><!--//.c-MasterItem_MainInfo-->
     <ul class="c-MasterItem_Category" v-if="this.gear_detail.genre != null">
      <li class="c-MasterItem_Category_Label"><a href="" class="u-TxtColor_Main">{{ gear_detail.genre.category.big_category.name }}</a></li>
      <li class="c-MasterItem_Category_Label"><a href="" class="u-TxtColor_Main">{{ gear_detail.genre.category.name }}</a></li>
      <li class="c-MasterItem_Category_Label"><a href="" class="u-TxtColor_Main">{{ gear_detail.genre.name }}</a></li>
     </ul><!-- /.c-MasterItem_Category -->
     <ul v-else class="c-MasterItem_Category">
      <li class="c-MasterItem_Category_Label"><a href="" class="u-TxtColor_Main">{{ gear_detail.category[0].big_category.name }}</a></li>
      <li class="c-MasterItem_Category_Label"><a href="" class="u-TxtColor_Main">{{ gear_detail.category[0].name }}</a></li>
     </ul>

     <ul class="c-MasterItem_SNSshare">
      <li class="c-MasterItem_SNSshare_Item">
       <a href="http://www.facebook.com/share.php?u={ページURL}" rel="nofollow" target="_blank" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-Facebook.svg" alt="facebook" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a href="https://twitter.com/share?url={ページURL}&via=Campbug_Outdoor&text=Campbug:{GearItemName}" rel="nofollow" target="_blank">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-Twitter.svg" alt="Twitter" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a data-pin-do="buttonBookmark" data-pin-lang="ja" href="https://jp.pinterest.com/pin/create/button/" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-pintarest.svg" alt="pintarest" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a href="http://getpocket.com/edit?url={ページURL}&title={GearItemName}" rel="nofollow" target="_blank" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-poket.svg" alt="poket" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a href="https://social-plugins.line.me/lineit/share?url={ページURL}" target="_blank" rel="nofollow" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-line.svg" alt="LINE" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a href="http://b.hatena.ne.jp/add?mode=confirm&url={ページURL}&title={ページのタイトル}" target="_blank" rel="nofollow" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-hatebu.svg" alt="hatebu" />
        </i>
       </a>
      </li>
      <li class="c-MasterItem_SNSshare_Item">
       <a href="https://feedly.com/i/subscription/feed/{ページURL}" target="_blank" rel="nofollow" class="c-MasterItem_SNSshare_Item-Link">
        <i class="c-MasterItem_SNSshare_Item-Icon">
         <img class="c-MasterItem_SNSshare_Item-Icon_Img" src="/img/sns_icon-feedly.svg" alt="feedly" />
        </i>
       </a>
      </li>
     </ul><!-- /.c-MasterItem_SNSshare -->

     <div class="c-MasterItem_ProductLink">
      <a href="" class="c-MasterItem_ProductLink_Btn -Amazon">Amazonで見る</a>
      <a href="" class="c-MasterItem_ProductLink_Btn -Rakuten">楽天市場で見る</a>
      <a href="" class="c-MasterItem_ProductLink_Btn -Yahoo">Yahooショッピングで見る</a>
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
import { mapState, mapMutations } from 'vuex'
import * as config from './../../config';
import HaveComment from '../object/card/HaveComment.vue';

export default {
    components: {
        'have-comment': HaveComment
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
}
</script>
