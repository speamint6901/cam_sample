<template>

    <!--通常のArticleCard-->
    <div>
    <article class="c-ArticleCard" v-for="gear in gears">

     <header class="c-ArticleCard_Header">
      <a href="">
       <figure>
        <img class="c-ArticleCard_Heading-Img u-ObjectFitImg" src="https://www.goldwin.co.jp/ec/img/l/NP71877.jpg" alt="GearName" />
       </figure>
      </a>
     </header>


     <div class="c-ArticleCard_Overview">
      <a class="c-ArticleCard_SubTtile u-Hedding_Card_Sub">
       BrandName
      </a><!--//.c-ArticleCard_SubTtile-->
      <h1 class="c-ArticleCard_Title u-Hedding_Card">
       <a href="" class="u-TxtColor_Txt">
        Gear Name
       </a>
      </h1><!--//.c-ArticleCard_Title-->
     </div><!--//_Overview-->


     <footer class="c-ArticleCard_Footer">
      <div class="c-ArticleCard_Status">
       <ul class="c-ArticleCard_Status_Wrap">
        <li class="c-ArticleCard_Status_Item">
         <i class="c-ArticleCard_Status-Icon">H.</i>
         <span class="c-ArticleCard_Status-Count">888T</span>
        </li>
        <li class="c-ArticleCard_Status_Item">
         <i class="c-ArticleCard_Status-Icon">W.</i>
         <span class="c-ArticleCard_Status-Count">888T</span>
        </li>
        <li class="c-ArticleCard_Status_Item">
         <i class="c-ArticleCard_Status-Icon">C.</i>
         <span class="c-ArticleCard_Status-Count">888T</span>
        </li>
       </ul>
      </div><!-- /.c-ArticleCard_Status -->

      <div class="c-ArticleCard_Rating">
       <div class="c-ArticleCard_Rating-Thunder">
        <img class="" src="/img/Dummt_Thunder.svg" alt="UserName" />
       </div><!-- /.c-ArticleCard_Rating-Thunder -->
       <p class="c-ArticleCard_Rating-Score u-Text_Main-S">
        3.4 THUNDER
       </p><!--//.c-ArticleCard_Rating-Score-->
      </div>
     </footer>

    </article>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    data() {
        return {
            gears: [
                { message: 'test1' },
                { message: 'test2' }
            ]
        }
    },
/*
    methods: {
        register() {
            this.loading = true;
            this.$store.dispatch('register', {
                email: this.email,
                name: this.name,
                password: this.password,
                password_confirmation: this.password_confirmation
            });
        },
    },
    computed: {
        email: {
            get: function () { return this.$store.getters.email },
            set: function (val) { this.$store.commit('updateEmail', val) }
        },
        name: {
            get: function () { return this.$store.getters.name },
            set: function (val) { this.$store.commit('updateName', val) }
        },
        password: {
            get: function () { return this.$store.getters.password },
            set: function (val) { this.$store.commit('updatePassword', val) }
        },
        password_confirmation: {
            get: function () { return this.$store.getters.password_confirmation },
            set: function (val) { this.$store.commit('updatePasswordConfirmation', val) }
        },
        loading: {
            get: function () { return this.$store.getters.loading },
            set: function (val) { this.$store.commit('updateLoading', val) }
        },
        ...mapState({
            errors: state => state.UserRegister.errors
        }),
    },
*/
}
</script>
