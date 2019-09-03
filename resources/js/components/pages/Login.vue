<template>

 <div class="l-Contents_Block">

  <article class="">
   <h1 class="c-Aricle_Hedding u-Hedding_Page u-TxAlign-Center">ログイン</h1>

   <p class="c-Error_Message u-TxAlign-Center u-Margin _mgBottom-base05" v-show="isError">メールアドレスまたはパスワードが違います</p>

   <form @submit.prevent="login"  class="l-Contents_Block-XS">

    <div class="c-Form_Parts">
     <label class="c-Form_Label" for="UserMail">メールアドレス</label>
     <input type="email" name="usermail" id="UserMail" class="c-Form_Input" v-model="email" placeholder="Mail">
    </div>

    <div class="c-Form_Parts u-Margin _mgBottom-base05">
     <label class="c-Form_Label" for="Password">パスワード</label>
     <input type="password" name="password" id="Password" class="c-Form_Input" v-model="password" placeholder="Password">
     <a href="" class="u-Text_Main-S u-TxtColor_Main u-Fill">パスワードを忘れてしまった方はこちら</a>
    </div>

    <div class="c-Form_Parts u-Flex _Justify-Center u-Margin _mgBottom-base05">
     <button type="submit" class="c-Form_Submit">Camp in</button>
    </div>


    <router-link to="/register" class="u-Text_Main-S u-TxAlign-Center u-TxtColor_Main u-Fill">
     新規登録の方はこちら
    </router-link>
   </form>
  </article>
 </div><!-- /.l-Contents_Block -->
</template>
 
<script>

export default {
    computed: {
        email: {
            get: function () { return this.$store.getters.loginEmail },
            set: function (val) { this.$store.commit('updateEmail', val) }
        },
        password: {
            get: function () { return this.$store.getters.loginPassword },
            set: function (val) { this.$store.commit('updatePassword', val) }
        },
        isError: {
            get: function () { return this.$store.getters.isError },
            set: function (val) { this.$store.commit('isError', val) }
        },
    },
    methods: {
        login() {
            this.$store.dispatch('login', {
                email: this.email,
                password: this.password,
            }).then((response) => {
                this.$store.dispatch('setAuthUser');
                this.$router.push({'path': '/'});
            }).catch((error) => {
            });
        },
    },
}
</script>
