<template>


 <footer class="l-Footer">

  <div class="c-Footer u-SiteSize">

  <div class="c-Footer_Block u-Fill">
   <div class="u-Flex _AlignItem-Center">
    <router-link to="/">
     <img class="c-Footer_Branding" src="/img/logo.svg" alt="Campbug" />
    </router-link>

    <nav class="c-Footer_Navi u-Desktop-Only" role="navigation">
    <ul class="c-Footer_Navi_Menu">
     <li class="c-Footer_Navi_Menu_Item">
      <router-link to="/privacy" class="c-Footer_Navi_Menu_Item-Link">PRIVACY POLICY</router-link>
     </li>
     <li class="c-Footer_Navi_Menu_Item ">
      <router-link to="/terms" class="c-Footer_Navi_Menu_Item-Link">TERMS OF SERVICE</router-link>
     </li>
    </ul>
   </nav>


    <nav class="c-Footer_Navi u-Tablet-Only" role="navigation">
     <ul class="c-Footer_Navi_Menu">
      <li class="c-Footer_Navi_Menu_Item c-Modal_OpenBtn" @click="setBrandList">
       BRAND
      </li>
      <li class="c-Footer_Navi_Menu_Item c-Modal_OpenBtn" @click="setCategoryList">
       CATEGORY
      </li>
     </ul>
    </nav>


   </div>
  </div><!-- /.c-Footer_Block -->



  </div><!-- /.c-Footer -->

 </footer>


</template>
