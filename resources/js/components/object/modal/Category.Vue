<template>
 <div class="c-MenuModal">
  <div class="c-Modal_Bg"></div>

  <div class="c-MenuModal_Contents">

   <button class="c-MenuModal_Close" @click="hideModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="c-MenuModal_Close-Img">
     <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    </svg>
   </button>

   <header class="c-MenuModal_Header">
    <h2 class="u-Text_Main-L u-TxAlign-Center p-CategoryList-Title">Category List</h2>
   </header>

   <section class="p-CategoryList-Block">
    <h3 class="p-CategoryList-Block_Label">テント・タープ<span class="p-CategoryList-Count">888</span></h3>
    <ul class="p-CategoryList-Categorys">
     <li class="p-CategoryList-Categorys-Name">テント・ツェルト<span class="p-CategoryList-Count">10</span></li>
     <li class="p-CategoryList-Categorys-Name">タープ・シェルター<span class="p-CategoryList-Count">0</span></li>
     <li class="p-CategoryList-Categorys-Name">テントアクセサリー<span class="p-CategoryList-Count">0</span></li>
     <li class="p-CategoryList-Categorys-Name">その他<span class="p-CategoryList-Count">888</span></li>
    </ul>
   </section>


   <section class="p-CategoryList-Block">
    <h3 class="p-CategoryList-Block_Label">ランタン・ライト<span class="p-CategoryList-Count">888</span></h3>
    <ul class="p-CategoryList-Categorys">
     <li class="p-CategoryList-Categorys-Name">
      燃料式ランタン<span class="p-CategoryList-Count">10</span>

      <input id="Genre1" class="p-CategoryList-Genre-Check" type="checkbox">
      <label class="p-CategoryList-Genre-Label" for="Genre1"></label>

      <div class="p-CategoryList-Genre_Contents">
       <ul>
        <li class="p-CategoryList-Genre-Name">電池式ランタン<span class="p-CategoryList-Count">0</span></li>
        <li class="p-CategoryList-Genre-Name">ヘッドライト<span class="p-CategoryList-Count">20</span></li>
        <li class="p-CategoryList-Genre-Name">ハンディーライト<span class="p-CategoryList-Count">888</span></li>
        <li class="p-CategoryList-Genre-Name">その他<span class="p-CategoryList-Count">76K</span></li>
       </ul>
      </div>
     </li>

     <li class="p-CategoryList-Categorys-Name">
      電池式ランタン/ライト<span class="p-CategoryList-Count">0</span>

      <input id="Genre2" class="p-CategoryList-Genre-Check" type="checkbox">
      <label class="p-CategoryList-Genre-Label" for="Genre2"></label>

      <div class="p-CategoryList-Genre_Contents">
       <ul>
        <li class="p-CategoryList-Genre-Name">電池式ランタン<span class="p-CategoryList-Count">0</span></li>
        <li class="p-CategoryList-Genre-Name">ヘッドライト<span class="p-CategoryList-Count">20</span></li>
        <li class="p-CategoryList-Genre-Name">ハンディーライト<span class="p-CategoryList-Count">888</span></li>
        <li class="p-CategoryList-Genre-Name">その他<span class="p-CategoryList-Count">76K</span></li>
       </ul>
      </div>

     </li>
     <li class="p-CategoryList-Categorys-Name">その他<span class="p-CategoryList-Count">0</span></li>
    </ul>
   </section>


   <section class="p-CategoryList-Block">
    <h3 class="p-CategoryList-Block_Label">調理器具・食事用具<span class="p-CategoryList-Count">888</span></h3>
    <ul class="p-CategoryList-Categorys">
     <li class="p-CategoryList-Categorys-Name">テント・ツェルト<span class="p-CategoryList-Count">10</span></li>
     <li class="p-CategoryList-Categorys-Name">タープ・シェルター<span class="p-CategoryList-Count">0</span></li>
     <li class="p-CategoryList-Categorys-Name">テントアクセサリー<span class="p-CategoryList-Count">0</span></li>
     <li class="p-CategoryList-Categorys-Name">その他<span class="p-CategoryList-Count">888</span></li>
    </ul>
   </section>


  </div><!--//.c-MenuModal_Contents-->

 </div><!--//.c-MenuModal-->

</template>

<script>
import * as config from './../../../config';
import store from './../../../store/index.js';
import MultiModalMixin from '../../../mixins/MultiModalMixin'

export default {
    mixins: [MultiModalMixin],
}
</script>
