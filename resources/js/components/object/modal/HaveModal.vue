<template>
 <div class="c-Modal">
  <div class="c-Modal_Bg"></div>

  <div class="c-Modal-Have">
   <header class="c-Modal-Have_Header">
    <h2 class="u-Text_Main-L u-TxtColor_White">Have : Review</h2>
   <button class="c-Modal-Have_Close" @click="hideModal">closeModal</button>
  </header>

   <div class="c-Modal-Have_Content">

    <div class="c-Modal-Have_Rating">
     <p class="c-Modal-Have_Rating_Title">Rating</p>
     <input type="range" value="0" min="0" max="5" step="0.1" class="c-Modal-Have_Rating_Slider" oninput="document.getElementById('output1').value=this.value">
     <output id="output1" class="c-Modal-Have_Rating_Num">0</output>
    </div><!-- /.c-Modal-Have_RatingSlider -->

    <textarea name="" id="Input_Gear_Review" cols="30" rows="25" class="c-Modal-Have_Textarea" placeholder="レビューを記入してください。無記入でも登録できます。"></textarea>
    <textarea name="" id="Input_Gear_Tag" cols="30" rows="5" class="c-Modal-Have_Textarea" placeholder="#タグ"></textarea>

   </div><!-- /.c-Modal-Have_Content -->

   <footer class="c-Modal-Have_Footer">
    <button>登録</button>
   </footer>
  </div><!--//c-Modal-Have-->

 </div><!--//c-Modal-Have-->
</template>

<script>
  import { mapState, mapMutations } from 'vuex'
  import MultiModalMixin from '../../../mixins/MultiModalMixin'
  export default {
    name: 'HaveModal',
    computed: {
        ...mapState('MultiModal', ['gear'])
    },
    mixins: [MultiModalMixin],
  }
</script>
