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

  <form @submit.prevent="toggleHave" class="l-Contents_Block-XS">
   <div class="c-Modal-Have_Content">

    <div class="c-Modal-Have_Rating">
     <p class="c-Modal-Have_Rating_Title">Rating</p>
     <input type="range" v-model="rating" min="0" max="5" step="0.1" class="c-Modal-Have_Rating_Slider" oninput="document.getElementById('output1').value=this.value">
     <output id="output1" class="c-Modal-Have_Rating_Num">0</output>
    </div><!-- /.c-Modal-Have_RatingSlider -->

    <textarea name="comment" v-model="comment" id="Input_Gear_Review" cols="30" rows="25" class="c-Modal-Have_Textarea" placeholder="レビューを記入してください。無記入でも登録できます。"></textarea>

   </div><!-- /.c-Modal-Have_Content -->

   <footer class="c-Modal-Have_Footer">
    <button type="submit" class="c-Modal-Have_Register c-Form_Submit">登録</button>
   </footer>
  </form>
  </div><!--//c-Modal-Have-->

 </div><!--//c-Modal-Have-->
</template>

<script>
  import { mapState, mapMutations } from 'vuex'
  import MultiModalMixin from '../../../mixins/MultiModalMixin'
  export default {
    name: 'HaveModal',
    computed: {
        //...mapState('MultiModal', ['gear']),
        gear: {
            get: function () { return this.$store.getters.gear },
        },
        have_count: {
            get: function () { return this.$store.getters.have_count },
        },
        isHave: {
            get: function () { return this.$store.getters.isHave },
        },
        comment: {
            get: function () { return this.$store.getters.comment },
        },
        rating: {
            get: function () { return this.$store.getters.rating },
        },
        isProcessing: {
            get: function () { return this.$store.getters.isProcessing },
        },
    },
    mixins: [MultiModalMixin],
    methods: {
        toggleHave() {
            this.$store.commit("setLoading", false)
            return new Promise((resolve, reject) => {
                this.$store.commit("setProcessing", true)
                axios.post(config.toggleWant, {
                    gear_id: this.gear.id,
                    count: this.have_count,
                    type: this.isHave,
                }).then(res => {
                    console.log(res.data)
                    this.have_count = res.data.count
                    this.isHave = res.data.type
                    this.$store.commit("setProcessing", false)
                    resolve();
                }).catch(error => {
                    console.log(error)
                    router.push({'path': '/login'});
                });
            });
        }
    }
  }
</script>
