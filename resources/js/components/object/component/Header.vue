<template>

 <header class="l-Header" id="js-HamburgerMenuHeader">
  <div class="c-Header u-SiteSize">

   <div class="c-Header_Block c-Header_NavMenu u-Tablet-Off">
    <nav class="c-GlobalNavi" role="navigation">
     <ul class="c-GlobalNavi_Menu">

      <li class="c-GlobalNavi_Menu_Item">
       <router-link to="/" class="c-GlobalNavi_Menu_Item-Link">
        HOME
       </router-link>
      </li>
      <li class="c-GlobalNavi_Menu_Item c-Modal_OpenBtn" @click="setBrandList">
       BRAND
      </li>
      <li class="c-GlobalNavi_Menu_Item c-Modal_OpenBtn" @click="setCategoryList">
       CATEGORY
      </li>

     </ul>
    </nav>
   </div><!-- /.c-Header_NavMenu -->

   <div class="c-Header_Block c-Header_Control">

    <form @submit.prevent="searchKeyword" class="c-Searchbar_Block">

     <div class="c-Searchbar-Select_Wrap">
     <select name="keyword_type" @input="changeKeywordType($event)" id="" class="c-Searchbar-Select">
      <option value="1">ALL</option>
      <option value="2">GEAR</option>
      <option value="3">BRAND</option>
     </select>
     </div><!-- /.c-Searchbar_Select_Wrap -->

     <div class="c-Searchbar">
      <i class="c-Searchbar-Icon">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="c-Searchbar-Icon-SVG">
        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
       </svg>
      </i>
      <input type="text" :value="filter.keyword" @input="changeKeyword($event)" name="keyword" id="s" class="c-Searchbar-Bar" placeholder="SEARCH">
      <button type="submit" class="c-Form_Submit">検索</button>
     </div><!--//c-Searchbar-->

    </form>

    <div class="c-Sort_Btn">
     <a class="c-Sort_Btn-Link">SORT</a>
    </div><!--//.c-Sort_Btn-->

    <div class="c-UserIcon u-Mb-Off">
     <div class="c-UserIcon_Thumb">
      <router-link to="/user" class="c-UserIcon_Thumb-Link">
       <img class="c-UserIcon_Thumb-Img u-ObjectFitImg" src="/img/user01.png" alt="UserName" />
      </router-link>
     </div><!--//.c-UserIcon_Thumb-->
    </div><!--//.c-UserIcon-->



   </div><!-- /.c-Header_Block -->
  </div><!-- /.c-Header -->


  <div class="p-HamburgerMenu" v-cloak>
   <div class="p-HamburgerMenu_ButtonArea" >
    <menu-btn :class="{ menu_btn: true, open_: menuFlag }" @click.native="menuToggle"></menu-btn>
   </div><!--//.p-HamburgerMenu_Button-->
  </div><!--//.p-HamburgerMenu-->

  <transition>
   <div v-show="menuFlag" :style="{ marginTop: headH }" class="p-HamburgerMenu_Overlay">

    <div class="p-HamburgerMenu_Wrap">

     <div class="p-HamburgerMenu_Branding">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.46 53.79">
       <path d="M48,53H38.88l-.68-7.25H32.85L32.17,53H24.64L31.36.88h9.69ZM37.33,38.46,35.7,17.7,33.59,38.46Z"/>
       <path d="M82.17,53.11H73.49V28.69L69.63,53.11H64.06L60,28.69V53.11H52.53V.88H63l4.14,30.73L72,.88H82.17Z"/>
       <path d="M99.22,34.32h-2V53h-9V.88H98.88c7.73,0,11.53,4.14,11.53,16.48C110.41,30.39,105.6,34.32,99.22,34.32ZM98.13,8.07h-.95V27.13h1c2,0,3.39-2,3.39-9.83C101.59,10,100.37,8.07,98.13,8.07Z"/>
       <path d="M126.57,53h-11.4V.88h11.47c6.51,0,10.79,3.8,10.79,13.3,0,5.83-1.43,10-4.48,12,3.25,1.7,5.08,5.7,5.08,12.62C138,48.16,134.1,53,126.57,53Zm-.95-44.83H124.2V22.72h1.42c2.17,0,3.32-1.22,3.32-7.32C128.94,8.75,127.52,8.14,125.62,8.14ZM125,29.84h-.81v16h1.56c2.44,0,3.52-1.9,3.52-7.6C129.28,31.61,127.25,29.84,125,29.84Z"/>
       <path d="M165,42.87c0,7.26-4.48,10.92-11.12,10.92-6.86,0-11.06-3.66-11.06-10.85V.88h8.95V43.82c0,2,1,3,2.58,3s2-1,2-3V.88H165Z"/>
       <path d="M192.46,53H190l-1.36-2.23c-1.9,2.17-4.27,3-8.47,3-6.11,0-10-3.46-10-10.45V11.6c0-7.73,4.34-11.6,11-11.6,6.18,0,10,3.86,10,11.67v6.85h-7l.09-8.09c0-2.45-.54-3.51-2.57-3.51s-2.58,1.08-2.58,3.46V44c0,2,.74,3,2.51,3,1.42,0,2.17-1,2.17-3V28h8.61Z"/>
       <path d="M13.56,18.52V9.77c0-2-1.14-2.85-2.23-2.85C10,6.92,9,7.73,9,9.77V44c0,2,.88,2.85,2.37,2.85S13.56,46,13.56,44V34.88h9v7.38c0,8.54-5.09,11.53-11.13,11.53S0,50.6,0,42.26V11.53C0,3.05,5.29,0,11.39,0S22.52,3,22.52,11.53v7Z"/>
      </svg>
     </div><!-- /.p-HamburgerMenu_Branding -->

     <ul class="p-HamburgerMenu_List">
      <li class="p-HamburgerMenu_Item"><router-link to="/" @click.native="menuToggle" class="p-HamburgerMenu_Item-Link">HOME</router-link></li>
      <li class="p-HamburgerMenu_Item"><router-link to="/terms" @click.native="menuToggle" class="p-HamburgerMenu_Item-Link">利用規約</router-link></li>
      <li class="p-HamburgerMenu_Item"><router-link to="/privacy" @click.native="menuToggle" class="p-HamburgerMenu_Item-Link">プライバシーポリシー</router-link></li>
      <li class="p-HamburgerMenu_Item"><router-link to="/register" @click.native="menuToggle" class="p-HamburgerMenu_Item-Link">ユーザー登録</router-link></li>
      <li class="p-HamburgerMenu_Item" v-show="auth"><router-link to="/logout" @click.native="menuToggle" class="p-HamburgerMenu_Item-Link">Logout</router-link></li>
      <li class="p-HamburgerMenu_Item" v-show="!auth"><router-link to="/login" @click.native="menuToggle" class="p-HamburgerMenu_Item-Link">Login</router-link></li>
     </ul><!--//.p-HamburgerMenu_List-->

     <div class="p-HamburgerMenu_SNS">
      <div class="p-HamburgerMenu_SNS_Item">
       <a href="https://www.facebook.com/campbug.outdoor/" target="_blank" class="p-HamburgerMenu_SNS_Item-Link">
        <svg xmlns="http://www.w3.org/2000/svg" width="16.55" height="32" viewBox="0 0 16.55 32" class="p-HamburgerMenu_SNS_Item-Img">
         <path class="st0" d="M3.68 17.68V32h6.96V17.75h4.75l1.15-5.94h-5.85V7.45c0-.6.32-1.41 1.3-1.41h3.38V0H9.05c-2.18 0-5.4 2.69-5.4 5.54v6.1H0v6.02l3.68.02z"/>
        </svg>
       </a>
      </div><!-- /.p-HamburgerMenu_SNS_Item -->
      <div class="p-HamburgerMenu_SNS_Item">
       <a href="https://twitter.com/Campbug_Outdoor" target="_blank" class="p-HamburgerMenu_SNS_Item-Link">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="26.01" viewBox="0 0 32 26.01" class="p-HamburgerMenu_SNS_Item-Img">
         <path class="st0" d="M32 3.08c-1.18.52-2.44.88-3.77 1.03 1.36-.81 2.4-2.1 2.89-3.63-1.27.75-2.67 1.3-4.17 1.59C25.75.8 24.04 0 22.15 0c-3.63 0-6.56 2.94-6.56 6.57 0 .51.06 1.02.17 1.5C10.3 7.79 5.47 5.17 2.23 1.2c-.57.97-.89 2.1-.89 3.3 0 2.28 1.16 4.29 2.92 5.46-1.08-.03-2.09-.32-2.97-.81v.08c0 3.18 2.26 5.83 5.27 6.44-.56.15-1.14.23-1.74.23-.42 0-.83-.04-1.24-.12.84 2.61 3.26 4.51 6.13 4.56-2.25 1.76-5.08 2.81-8.15 2.81-.53 0-1.05-.03-1.57-.09 2.91 1.86 6.36 2.95 10.06 2.95 12.08 0 18.68-10 18.68-18.68 0-.28-.01-.57-.02-.85 1.3-.93 2.41-2.08 3.29-3.4z"/>
        </svg>
       </a>
      </div><!-- /.p-HamburgerMenu_SNS_Item -->
      <div class="p-HamburgerMenu_SNS_Item">
       <a href="https://www.instagram.com/camp_bug/" target="_blank" class="p-HamburgerMenu_SNS_Item-Link">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="p-HamburgerMenu_SNS_Item-Img">
         <path class="st0" d="M26.32 16c0-5.7-4.62-10.32-10.32-10.32S5.68 10.3 5.68 16 10.3 26.32 16 26.32 26.32 21.7 26.32 16zm-.19-11.72c-.92 0-1.66.75-1.66 1.66 0 .92.74 1.66 1.66 1.66.91 0 1.66-.74 1.66-1.66 0-.92-.75-1.66-1.66-1.66zM7.56 1.89h16.87c3.13 0 5.67 2.55 5.67 5.67v16.87c0 3.13-2.55 5.67-5.67 5.67H7.56c-3.12 0-5.67-2.55-5.67-5.67V7.56c0-3.12 2.55-5.67 5.67-5.67zM24.44 0H7.56C3.41 0 0 3.41 0 7.56v16.87C0 28.6 3.41 32 7.56 32h16.87C28.6 32 32 28.6 32 24.44V7.56C32 3.41 28.6 0 24.44 0zM7.82 16c0-4.51 3.66-8.18 8.18-8.18s8.18 3.66 8.18 8.18c0 4.51-3.66 8.18-8.18 8.18S7.82 20.52 7.82 16z"/>
        </svg>
       </a>
      </div><!-- /.p-HamburgerMenu_SNS_Item -->
      <div class="p-HamburgerMenu_SNS_Item">
       <a href="https://www.pinterest.jp/campbug_outdoor/" target="_blank" class="p-HamburgerMenu_SNS_Item-Link">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" class="p-HamburgerMenu_SNS_Item-Img">
         <path class="st0" d="M32 16c0 2.9-.72 5.58-2.15 8.03-1.43 2.45-3.37 4.39-5.82 5.82C21.58 31.29 18.9 32 16 32c-1.54 0-3.06-.22-4.54-.67.82-1.29 1.36-2.43 1.62-3.42.12-.47.5-1.94 1.12-4.39.28.54.78 1.01 1.52 1.41.74.39 1.53.59 2.38.59 1.68 0 3.18-.48 4.5-1.43 1.32-.95 2.34-2.26 3.06-3.93.72-1.67 1.08-3.54 1.08-5.62 0-1.58-.41-3.07-1.24-4.46-.83-1.39-2.02-2.52-3.59-3.4-1.57-.88-3.34-1.31-5.31-1.31-1.46 0-2.82.2-4.08.6-1.26.4-2.34.94-3.22 1.61-.88.67-1.64 1.43-2.27 2.3-.63.87-1.1 1.77-1.4 2.7-.3.93-.45 1.86-.45 2.79 0 1.44.28 2.71.83 3.81.56 1.1 1.37 1.87 2.44 2.31.42.17.68.03.79-.42.03-.1.08-.31.17-.65.08-.33.14-.54.17-.62.08-.32.01-.62-.23-.9-.71-.85-1.06-1.89-1.06-3.14 0-2.1.73-3.9 2.18-5.41 1.45-1.51 3.35-2.26 5.7-2.26 2.1 0 3.73.57 4.91 1.71 1.17 1.14 1.76 2.62 1.76 4.44 0 2.36-.48 4.37-1.43 6.02-.95 1.65-2.17 2.48-3.66 2.48-.85 0-1.53-.3-2.04-.91-.51-.6-.67-1.33-.48-2.18.11-.49.3-1.13.55-1.95.26-.81.47-1.53.62-2.15.16-.62.24-1.14.24-1.57 0-.69-.19-1.27-.56-1.73-.38-.46-.91-.69-1.6-.69-.86 0-1.59.39-2.19 1.19-.6.79-.9 1.78-.9 2.96 0 1.01.17 1.86.52 2.54l-2.06 8.71c-.24.97-.33 2.2-.27 3.69-2.86-1.26-5.17-3.21-6.94-5.85C.88 22.17 0 19.24 0 16c0-2.9.72-5.58 2.15-8.03 1.43-2.45 3.37-4.39 5.82-5.82C10.42.71 13.1 0 16 0c2.9 0 5.58.71 8.03 2.15 2.45 1.43 4.39 3.37 5.82 5.82C31.28 10.42 32 13.1 32 16z"/>
        </svg>
       </a>
      </div><!-- /.p-HamburgerMenu_SNS_Item -->
     </div><!-- /.p-HamburgerMenu_SNS -->

    </div><!-- /.p-HamburgerMenu_Wrap -->

   </div><!--//.p-HamburgerMenu_Overlay-->
  </transition>
  <multi-search-modal-view></multi-search-modal-view>

 </header>

</template>

<script>

import { mapState, mapActions } from 'vuex';
import * as config from './../../../config';
import MultiSearchModalView from '../modal/MultiSearchModalView.vue'

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
        active:false,
        assetDomain: config.assetDomain
    }
  },
  computed: {
    ...mapState({
        auth: state => state.authUser.authenticated,
    }),
    ...mapState('Search', ['filter', 'sort', 'onFilter', 'onSort']),
  },
  methods: {
    ...mapActions('Search', ['getInitialGears', 'setBrandList', 'setCategoryList']),
    changeKeywordType(e) {
        this.$store.commit('Search/setKeywordType', e.target.value);
    },
    changeKeyword(e) {
        this.$store.commit('Search/setKeyword', e.target.value);
    },
    searchKeyword() {
        if (this.filter.keyword) {
            this.$store.commit('Search/setOnFilter', 1)
            this.$store.commit('setLoading', true)
            this.getInitialGears();
        } else {
            this.$store.commit('Search/setOnFilter', 0)
            this.$store.commit('setLoading', true)
            this.getInitialGears();
        }
    },
    menuToggle: function() {
      //menuFlag切り替え
      this.menuFlag = !this.menuFlag;
    }
  },
  components: {
    'menu-btn': menuBtnComp,
    MultiSearchModalView
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
