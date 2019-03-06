<template>

 <header class="l-Header u-SiteSize" id="js-HamburgerMenuHeader">
  <div class="c-Header">

   <div class="c-Header_Block u-Half">
    <nav class="c-GlobalNavi" role="navigation">
     <ul class="c-GlobalNavi_Menu">

      <li class="c-GlobalNavi_Menu_Item">
       <router-link to="/" class="c-GlobalNavi_Menu_Item-Link">
        HOME
       </router-link>
      </li>

      <li class="c-GlobalNavi_Menu_Item" v-show="!auth">
       <router-link to="/login" class="c-GlobalNavi_Menu_Item-Link">
        LOGIN
       </router-link>
      </li>

      <li class="c-GlobalNavi_Menu_Item" v-show="auth">
       <router-link to="/logout" class="c-GlobalNavi_Menu_Item-Link">
        LOGOUT
       </router-link>
      </li>
      <li class="c-GlobalNavi_Menu_Item">
       <router-link to="/register" class="c-GlobalNavi_Menu_Item-Link">
        ユーザー登録
       </router-link>
      </li>
      <li class="c-GlobalNavi_Menu_Item">
       <router-link to="/gear" class="c-GlobalNavi_Menu_Item-Link">
         ギア詳細
       </router-link>
      </li>
      <li class="c-GlobalNavi_Menu_Item">
       <router-link to="/user" class="c-GlobalNavi_Menu_Item-Link">
        マイページ
       </router-link>
      </li>

     </ul>
    </nav>
   </div><!-- /.c-Header_Block -->

   <div class="c-Header_Block u-Half u-Flex _Justify-End _AlignItem-Center">

    <form role="search" method="post" id="searchform" action="">
     <div class="c-Searchbar">
      <label class="screen-reader-text" for="s"></label>
      <input type="text" value="" name="s" id="s" placeholder="keyword search">
      <input type="hidden" value="" id="filter_id" name="filter_id">
      <input type="submit" id="searchsubmit" value="&#xf002;"  />
     </div><!--//c-Searchbar-->
    </form>

    <div class="c-UserIcon">
     <div class="c-UserIcon_Thumb">
      <img class="c-UserIcon_Thumb-Img u-ObjectFitImg" src="/img/user01.png" alt="UserName" />
     </div><!--//.c-UserIcon_Thumb-->
    </div><!--//.c-UserIcon-->

    <div class="p-HamburgerMenu" v-cloak>
     <div class="p-HamburgerMenu_ButtonArea" >
      <menu-btn :class="{ menu_btn: true, open_: menuFlag }" @click.native="menuToggle"></menu-btn>
     </div><!--//.p-HamburgerMenu_Button-->

     <transition>
      <div v-show="menuFlag" :style="{ marginTop: headH }" class="p-HamburgerMenu_Overlay">
       <div class="">
        Menu
       </div>
      </div><!--//.p-HamburgerMenu_Overlay-->
     </transition>
    </div><!--//.p-HamburgerMenu-->

   </div><!-- /.c-Header_Block -->

  </div><!-- /.c-Header -->
 </header>

</template>

<script>

import { mapState } from 'vuex';
var menuBtnComp = {
  template: `
<div>
<span class="p-HamburgerMenu_Trigger">
<span></span>
<span></span>
<span></span>
</span>
</div>
`
}

export default {

  data() {
    return {
        menuFlag: false,
        headH: "0px",
        sublistlabel:{
            "Cloth":"",
            "Pants":"",
            "Shoes":"",
            "Goods":""
        },
        active:false
    }
  },
  computed: {
    ...mapState({
        auth: state => state.AuthUser.authenticated
    }),
  },
  methods: {
    menuToggle: function() {
      //menuFlag切り替え
      this.menuFlag = !this.menuFlag;
    }
  },
/*  mounted: function() {
    //headerの高さ取得
   let h = document.getElementById("js-HamburgerMenuHeader").offsetHeight;
    this.headH = h + "px";
  },*/
  components: {
    'menu-btn': menuBtnComp,
  }
}

</script>

<style>
[v-cloak]{  display: none;}
@keyframes show{
    from{opacity: 0;}
    to{opacity: 1;}
}
</style>
