<template>
 <div class="c-Modal">
  <div class="c-Modal_Bg"></div>
  <div class="c-Modal-Have">

   <header class="c-Modal-Have_Header">
    <h2 class="u-Text_Main-L u-TxtColor_White">Have : Review</h2>
   <button class="c-Modal-Have_Close" @click="hideModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="c-Modal-Have_Close-Img">
     <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    </svg>
   </button>
  </header>

  <form @submit.prevent="toggleHave" >
   <div class="c-Modal-Have_Content">

    <div class="c-Modal-Have_Rating">
     <p class="c-Modal-Have_Rating_Title">Rating</p>
     <input type="range" :value="have_rating" @input="updateRatingForm($event)" min="0" max="5" step="1" class="c-Modal-Have_Rating_Slider" oninput="document.getElementById('output1').value=this.value">
     <output id="output1" class="c-Modal-Have_Rating_Num">{{ have_rating }}</output>
    </div><!-- /.c-Modal-Have_RatingSlider -->

    <textarea name="comment" :value="have_comment" @input="updateCommentForm($event)" id="Input_Gear_Review" cols="30" rows="25" class="c-Modal-Have_Textarea" placeholder="レビューを記入してください。無記入でも登録できます。"></textarea>

   </div><!-- /.c-Modal-Have_Content -->

   <footer class="c-Modal-Have_Footer">
    <button v-show="!isHave" type="submit" v-bind:disabled="isProcessing" @click="toggleTypeChange('regist')" class="c-Modal-Have_Register c-Form_Submit">登録</button>
    <button v-show="isHave" type="submit" v-bind:disabled="isProcessing" @click="toggleTypeChange('update')" class="c-Modal-Have_Register c-Form_Submit">編集</button>
    <button v-show="isHave" type="submit" v-bind:disabled="isProcessing" @click="toggleTypeChange('detach')" class="c-Modal-Have_Delete c-Form_Submit">削除</button>
   </footer>
  </form>
  </div><!--//c-Modal-Have-->

 </div><!--//c-Modal-Have-->
</template>

<script>
  import MultiModalMixin from '../../../mixins/MultiModalMixin'
  import { mapState, mapMutations, mapActions } from 'vuex';

  export default {
    computed: {
        ...mapState('MultiModal', [
            'after_have_count', 'have_gear', 'have_count',
            'isHave', 'current_gear_id', 'have_type', 'isProcessing',
            'have_rating', 'have_comment'
        ]),
        isHave: {
             get() { return this.$store.getters['MultiModal/isHave'] },
             set(val) { this.$store.commit('MultiModal/setIsHave', this.have_gear.have_users_count) }
        }
    },
    mixins: [MultiModalMixin],
    methods: {
      updateRatingForm(e) {
        this.$store.commit('MultiModal/updateRatingForm', e.target.value) 
      },
      updateCommentForm(e) {
        this.$store.commit('MultiModal/updateCommentForm', e.target.value)
      },
      toggleHave () {
        this.$store.dispatch('MultiModal/changeIsProcessing', true)
        this.$store.dispatch('MultiModal/toggleHave', {
            gear_id: this.have_gear.id,
            count: this.have_count,
            rating: this.have_rating,
            comment: this.have_comment,
            type: this.have_type,
        }).then((res) => {
            console.log(res)
            this.hideModal()
            this.$store.dispatch('MultiModal/changeIsProcessing', false)
        }).catch((error) => {});
      },
      ...mapActions('MultiModal', ['toggleTypeChange'])
    }
  }
</script>
