<template>

 <article class="">

  <div class="l-Contents_Block">
   <h1 class="c-Aricle_Hedding u-Hedding_Page u-TxAlign-Center">ログイン</h1>

   <p v-show="isError">メールアドレスまたはパスワードが違います</p>

   <form @submit.prevent="login"  class="l-Contents_Block-S">

    <div class="c-Form_Parts">
     <label class="c-Form_Label" for="UserMail">メールアドレス</label>
     <input type="email" name="usermail" id="UserMail" class="c-Form_Input" v-model="email">
    </div>

    <div class="c-Form_Parts">
     <label class="c-Form_Label" for="Password">パスワード</label>
     <input type="password" name="password" id="Password" class="c-Form_Input" v-model="password">
    </div>

    <button type="submit" class="">ログイン</button>

   </form>        
  </div><!-- /.l-Contents_Block -->

 </article>
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
        /*
        loading: {
            get: function () { return this.$store.Login.getters.loading },
            set: function (val) { this.$store.commit('updateLoading', val) }
        },
        */
        isError: {
            get: function () { return this.$store.getters.isError },
            set: function (val) { this.$store.commit('isError', val) }
        },
    },
    methods: {
        login() {
            //this.loading = true;
            this.$store.dispatch('login', {
                email: this.email,
                password: this.password,
            });
        },
    },
}
</script>
