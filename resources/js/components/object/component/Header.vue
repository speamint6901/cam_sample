<template>

 <header class="l-Header c-Header">

  <div class="c-Header_Block u-Half">
   <nav class="c-GlobalNavi" role="navigation">
    <ul class="c-GlobalNavi_Menu">

     <li class="c-GlobalNavi_Menu_Item">
      <router-link to="/" class="c-GlobalNavi_Menu_Item-Link">
       HOME
      </router-link>
     </li>

     <li class="c-GlobalNavi_Menu_Item">
      <router-link to="/login" class="c-GlobalNavi_Menu_Item-Link">
      LOGIN
      </router-link>
     </li>

     <li class="c-GlobalNavi_Menu_Item">
      <router-link to="/register" class="c-GlobalNavi_Menu_Item-Link">
      ユーザー登録
      </router-link>
     </li>

     <li class="c-GlobalNavi_Menu_Item">
      <router-link to="/user" class="c-GlobalNavi_Menu_Item-Link">
      ユーザー情報
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

  </div><!-- /.c-Header_Block -->


 </header>



</template>
