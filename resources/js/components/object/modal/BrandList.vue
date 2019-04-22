<template>
 <div class="c-MenuModal">
  <div class="c-MenuModal_Bg"></div>

  <div v-show="isLoading" class="c-Loader05">Loading..</div>
  <div v-show="!isLoading" class="c-MenuModal_Contents">

   <button class="c-MenuModal_Close" @click="hideModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="c-MenuModal_Close-Img">
     <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    </svg>
   </button>

   <header class="c-MenuModal_Header">
    <h2 class="u-Text_Main-L u-TxAlign-Center p-BrandList-Title">BRAND</h2>
  </header>

  <nav class="p-BrandList-Nav">
   <ul class="p-BrandList-Nav_Menu">
    <li class="p-BrandList-Nav_Item">A</li>
    <li class="p-BrandList-Nav_Item">B</li>
    <li class="p-BrandList-Nav_Item">C</li>
    <li class="p-BrandList-Nav_Item">D</li>
    <li class="p-BrandList-Nav_Item">E</li>
    <li class="p-BrandList-Nav_Item">F</li>
    <li class="p-BrandList-Nav_Item">G</li>
    <li class="p-BrandList-Nav_Item">H</li>
    <li class="p-BrandList-Nav_Item">I</li>
    <li class="p-BrandList-Nav_Item">J</li>
    <li class="p-BrandList-Nav_Item">K</li>
    <li class="p-BrandList-Nav_Item">L</li>
    <li class="p-BrandList-Nav_Item">M</li>
    <li class="p-BrandList-Nav_Item">N</li>
    <li class="p-BrandList-Nav_Item">O</li>
    <li class="p-BrandList-Nav_Item">P</li>
    <li class="p-BrandList-Nav_Item">Q</li>
    <li class="p-BrandList-Nav_Item">R</li>
    <li class="p-BrandList-Nav_Item">S</li>
    <li class="p-BrandList-Nav_Item">T</li>
    <li class="p-BrandList-Nav_Item">U</li>
    <li class="p-BrandList-Nav_Item">V</li>
    <li class="p-BrandList-Nav_Item">W</li>
    <li class="p-BrandList-Nav_Item">X</li>
    <li class="p-BrandList-Nav_Item">Y</li>
    <li class="p-BrandList-Nav_Item">Z</li>
    <li class="p-BrandList-Nav_Item">Other</li>
   </ul>
  </nav>

   <section class="p-BrandList-Block">
    <h3 class="p-BrandList-Block_Label">A</h3>
    <ul class="p-BrandList-Brand">
     <li class="p-BrandList-Brand_Name">A＆F<span class="p-BrandList-Brand_Count">10</span></li>
     <li class="p-BrandList-Brand_Name">ADIRONDACK<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">AIGLE<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">AIRMONTE<span class="p-BrandList-Brand_Count">888</span></li>
     <li class="p-BrandList-Brand_Name">Amok Equipment<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">and wander<span class="p-BrandList-Brand_Count">20K</span></li>
     <li class="p-BrandList-Brand_Name">antigravitygear<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">ALDIES<span class="p-BrandList-Brand_Count">0</span></li>
    </ul>
   </section>


   <section class="p-BrandList-Block">
    <h3 class="p-BrandList-Block_Label">B</h3>
    <ul class="p-BrandList-Brand">
     <li class="p-BrandList-Brand_Name">A＆F<span class="p-BrandList-Brand_Count">10</span></li>
     <li class="p-BrandList-Brand_Name">ADIRONDACK<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">AIGLE<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">AIRMONTE<span class="p-BrandList-Brand_Count">888</span></li>
     <li class="p-BrandList-Brand_Name">Amok Equipment<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">and wander<span class="p-BrandList-Brand_Count">20K</span></li>
     <li class="p-BrandList-Brand_Name">antigravitygear<span class="p-BrandList-Brand_Count">0</span></li>
     <li class="p-BrandList-Brand_Name">ALDIES<span class="p-BrandList-Brand_Count">0</span></li>
    </ul>
   </section>

  </div><!--//.c-MenuModal_Contents-->

 </div><!--//.c-MenuModal-->
</template>

<script>
import * as config from './../../../config';
import store from './../../../store/index.js';
import SearchModalMixin from '../../../mixins/SearchModalMixin.js'

export default {
    mixins: [SearchModalMixin],
}
</script>
