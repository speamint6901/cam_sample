<template>
 <div class="c-Modal">
  <div class="c-Modal_Bg"></div>
  <div class="c-Modal-Have">
   <header class="c-Modal-Have_Header">
    <h2 class="u-Text_Main-L u-TxtColor_White">Category List</h2>
   <button class="c-Modal-Have_Close" @click="hideModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="c-Modal-Have_Close-Img">
     <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    </svg>
   </button>
  </header>
  </div>
</div>

</template>

<script>
import * as config from './../../../config';
import store from './../../../store/index.js';

export default {

}
</script>
