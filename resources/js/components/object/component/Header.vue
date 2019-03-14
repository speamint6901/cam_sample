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
      <input type="text" value="" name="search_keyword" id="s" placeholder="keyword search">
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

       <div class="p-HamburgerMenu_Wrap">

        <ul class="p-HamburgerMenu_List">
         <li class="p-HamburgerMenu_Item"><a href="" class="p-HamburgerMenu_Item-Link">Brand List</a></li>
         <li class="p-HamburgerMenu_Item"><a href="" class="p-HamburgerMenu_Item-Link">ギア登録申請</a></li>
         <li class="p-HamburgerMenu_Item"><a href="" class="p-HamburgerMenu_Item-Link">アカウント設定</a></li>
         <li class="p-HamburgerMenu_Item"><a href="" class="p-HamburgerMenu_Item-Link">Logout</a></li>
        </ul><!--//.p-HamburgerMenu_List-->

        <div class="p-HamburgerMenu_SNS">
         <div class="p-HamburgerMenu_SNS_Item">
          <a href="" class="p-HamburgerMenu_SNS_Item-Link">
           <svg xmlns="http://www.w3.org/2000/svg" width="16.55" height="32" viewBox="0 0 16.55 32" class="p-HamburgerMenu_SNS_Item-Img">
            <path class="st0" d="M3.68 17.68V32h6.96V17.75h4.75l1.15-5.94h-5.85V7.45c0-.6.32-1.41 1.3-1.41h3.38V0H9.05c-2.18 0-5.4 2.69-5.4 5.54v6.1H0v6.02l3.68.02z"/>
           </svg>
          </a>
         </div><!-- /.p-HamburgerMenu_SNS_Item -->
         <div class="p-HamburgerMenu_SNS_Item">
          <a href="" class="p-HamburgerMenu_SNS_Item-Link">
           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="26.01" viewBox="0 0 32 26.01" class="p-HamburgerMenu_SNS_Item-Img">
            <path class="st0" d="M32 3.08c-1.18.52-2.44.88-3.77 1.03 1.36-.81 2.4-2.1 2.89-3.63-1.27.75-2.67 1.3-4.17 1.59C25.75.8 24.04 0 22.15 0c-3.63 0-6.56 2.94-6.56 6.57 0 .51.06 1.02.17 1.5C10.3 7.79 5.47 5.17 2.23 1.2c-.57.97-.89 2.1-.89 3.3 0 2.28 1.16 4.29 2.92 5.46-1.08-.03-2.09-.32-2.97-.81v.08c0 3.18 2.26 5.83 5.27 6.44-.56.15-1.14.23-1.74.23-.42 0-.83-.04-1.24-.12.84 2.61 3.26 4.51 6.13 4.56-2.25 1.76-5.08 2.81-8.15 2.81-.53 0-1.05-.03-1.57-.09 2.91 1.86 6.36 2.95 10.06 2.95 12.08 0 18.68-10 18.68-18.68 0-.28-.01-.57-.02-.85 1.3-.93 2.41-2.08 3.29-3.4z"/>
           </svg>
          </a>
         </div><!-- /.p-HamburgerMenu_SNS_Item -->
         <div class="p-HamburgerMenu_SNS_Item">
          <a href="" class="p-HamburgerMenu_SNS_Item-Link">
           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="p-HamburgerMenu_SNS_Item-Img">
            <path class="st0" d="M26.32 16c0-5.7-4.62-10.32-10.32-10.32S5.68 10.3 5.68 16 10.3 26.32 16 26.32 26.32 21.7 26.32 16zm-.19-11.72c-.92 0-1.66.75-1.66 1.66 0 .92.74 1.66 1.66 1.66.91 0 1.66-.74 1.66-1.66 0-.92-.75-1.66-1.66-1.66zM7.56 1.89h16.87c3.13 0 5.67 2.55 5.67 5.67v16.87c0 3.13-2.55 5.67-5.67 5.67H7.56c-3.12 0-5.67-2.55-5.67-5.67V7.56c0-3.12 2.55-5.67 5.67-5.67zM24.44 0H7.56C3.41 0 0 3.41 0 7.56v16.87C0 28.6 3.41 32 7.56 32h16.87C28.6 32 32 28.6 32 24.44V7.56C32 3.41 28.6 0 24.44 0zM7.82 16c0-4.51 3.66-8.18 8.18-8.18s8.18 3.66 8.18 8.18c0 4.51-3.66 8.18-8.18 8.18S7.82 20.52 7.82 16z"/>
           </svg>
          </a>
         </div><!-- /.p-HamburgerMenu_SNS_Item -->
         <div class="p-HamburgerMenu_SNS_Item">
          <a href="" class="p-HamburgerMenu_SNS_Item-Link">
           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="p-HamburgerMenu_SNS_Item-Img">
            <path class="st0" d="M32 16c0 2.9-.72 5.58-2.15 8.03-1.43 2.45-3.37 4.39-5.82 5.82C21.58 31.29 18.9 32 16 32c-1.54 0-3.06-.22-4.54-.67.82-1.29 1.36-2.43 1.62-3.42.12-.47.5-1.94 1.12-4.39.28.54.78 1.01 1.52 1.41.74.39 1.53.59 2.38.59 1.68 0 3.18-.48 4.5-1.43 1.32-.95 2.34-2.26 3.06-3.93.72-1.67 1.08-3.54 1.08-5.62 0-1.58-.41-3.07-1.24-4.46-.83-1.39-2.02-2.52-3.59-3.4-1.57-.88-3.34-1.31-5.31-1.31-1.46 0-2.82.2-4.08.6-1.26.4-2.34.94-3.22 1.61-.88.67-1.64 1.43-2.27 2.3-.63.87-1.1 1.77-1.4 2.7-.3.93-.45 1.86-.45 2.79 0 1.44.28 2.71.83 3.81.56 1.1 1.37 1.87 2.44 2.31.42.17.68.03.79-.42.03-.1.08-.31.17-.65.08-.33.14-.54.17-.62.08-.32.01-.62-.23-.9-.71-.85-1.06-1.89-1.06-3.14 0-2.1.73-3.9 2.18-5.41 1.45-1.51 3.35-2.26 5.7-2.26 2.1 0 3.73.57 4.91 1.71 1.17 1.14 1.76 2.62 1.76 4.44 0 2.36-.48 4.37-1.43 6.02-.95 1.65-2.17 2.48-3.66 2.48-.85 0-1.53-.3-2.04-.91-.51-.6-.67-1.33-.48-2.18.11-.49.3-1.13.55-1.95.26-.81.47-1.53.62-2.15.16-.62.24-1.14.24-1.57 0-.69-.19-1.27-.56-1.73-.38-.46-.91-.69-1.6-.69-.86 0-1.59.39-2.19 1.19-.6.79-.9 1.78-.9 2.96 0 1.01.17 1.86.52 2.54l-2.06 8.71c-.24.97-.33 2.2-.27 3.69-2.86-1.26-5.17-3.21-6.94-5.85C.88 22.17 0 19.24 0 16c0-2.9.72-5.58 2.15-8.03 1.43-2.45 3.37-4.39 5.82-5.82C10.42.71 13.1 0 16 0c2.9 0 5.58.71 8.03 2.15 2.45 1.43 4.39 3.37 5.82 5.82C31.28 10.42 32 13.1 32 16z"/>
           </svg>
          </a>
         </div><!-- /.p-HamburgerMenu_SNS_Item -->
        </div><!-- /.p-HamburgerMenu_SNS -->

       </div><!-- /.p-HamburgerMenu_Wrap -->

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
        auth: state => state.authUser.authenticated
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
