<template>

 <header class="l-Header u-SiteSize">
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

   <div class="c-Header_Block u-Half u-Flex _Justify-End">

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
    <div v-cloak>
      <div id="header">
        <menu-btn 
           :class="{ menu_btn: true, open_: menuFlag }" 
	   @click.native="menuToggle">
	</menu-btn>
      </div>
      <transition>
        <div id="sp_menu" v-show="menuFlag" :style="{ marginTop: headH }">
          <div class="menu_wrapp">
	    Menu
	  </div>
        </div>
      </transition>
    </div>
   </div><!-- /.c-Header_Block -->

  </div><!-- /.c-Header -->
 </header>

</template>

<script>
 
import { mapState } from 'vuex';
var menuBtnComp = {
  template: `
    <div>
        <span class="menu_trigger">
            <span></span><span></span><span></span>
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
  mounted: function() {
    //headerの高さ取得
    let h = document.getElementById("header").offsetHeight;
    this.headH = h + "px";
  },
  components: {
    'menu-btn': menuBtnComp,
  }
}

</script>

<style>
[v-cloak]{
  display: none;
}
@keyframes show{
    from{
        opacity: 0;
    }
    to{
        opacity: 1;
    }
}
header{
  padding: 16px;
  background: #f3f3f3;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 100;
}

.menu_btn{
    width: 10vw;
    height: 10vw;
    max-width: 60px;
    max-height: 60px;
    padding: 2% 0;
    cursor: pointer;

    .menu_trigger{
        position: relative;
        display: block;
        width: 100%;
        height: 100%;      
        span{
            position: absolute;
            left: 0;
            display: block;
            width: 100%;
            height: 2px;
            background: #333;
            border-radius: 2px;
            transition: all .4s;

            &:nth-of-type(1) {
                top: 0;
            }
            &:nth-of-type(2) {
                top: calc(50% - 1px);
            }
            &:nth-of-type(3) {
                bottom: 0;
            }
        }
    }

    //メニュー開いたとき
    &.open_{
        .menu_trigger span:nth-of-type(1) {
            top: calc(50% - 1px);
            transform: rotate(-45deg);
        }
        .menu_trigger span:nth-of-type(2) {
            opacity: 0;
        }
        .menu_trigger span:nth-of-type(3) {
            bottom: calc(50% - 1px);
            transform: rotate(45deg);
        }
    }
}


#sp_menu{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 99;
  padding: 5%;
  background: rgba(0,0,0,0.9);
  transition: all 0.5s;
  color: #fff;
  &.v-enter, &.v-leave-to {
        opacity: 0;
    }
}
</style>
