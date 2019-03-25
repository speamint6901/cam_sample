<template>

 <div class="l-Contents_Block u-Dsp-Initial">

   <div v-show="loading" class="c-Loader05">Loading..</div>


  <article v-show="!loading">

   <div class="l-Contents_Block">

    <h1 class="c-Aricle_Hedding u-Hedding_Page u-TxAlign-Center">新規登録</h1>

    <form @submit.prevent="register" class="l-Contents_Block-XS">

     <div class="c-Form_Parts">
      <label class="c-Form_Label" for="UserMail">メールアドレス</label>
      <input type="email" name="usermail" id="UserMail" class="c-Form_Input" v-model="email">
      <span class="help-block" v-if="errors && errors.email">{{ errors.email[0] }}</span>
     </div>

     <div class="c-Form_Parts">
      <label class="c-Form_Label" for="UserName">ユーザーネーム</label>
      <input type="text" name="username" id="UserName" class="c-Form_Input" v-model="name">
      <span class="help-block" v-if="errors && errors.name">{{ errors.name[0] }}</span>
     </div>

     <div class="c-Form_Parts">
      <label class="c-Form_Label" for="Password">パスワード</label>
      <input type="password" name="password" id="Password" class="c-Form_Input" v-model="password">
      <span class="help-block" v-if="errors && errors.password">{{ errors.password[0] }}</span>
     </div>

     <div class="c-Form_Parts u-Margin _mgBottom-base05">
      <label class="c-Form_Label" for="PasswordConfirmation">パスワード確認</label>
      <input type="password" name="password_confirmation" id="PasswordConfirmation" class="c-Form_Input" v-model="password_confirmation">
      <span class="help-block" v-if="errors && errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
     </div>

     <div class="c-Form_Parts">
      <input type="checkbox" name="" id="idch01" value="" class="c-Form_Input -Checkbox">
      <label class="c-Form_Label -CheckBox u-Text_Main-S" for="idch01">
       <a href="" class="u-TxtColor_Main">利用規約</a>と<a href="" class="u-TxtColor_Main">プライバシーポリシー</a>に同意する
      </label>
     </div>

     <div class="c-Form_Parts u-Flex _Justify-Center">
      <button type="submit" class="c-Form_Submit">登録</button>
     </div>

    </form>

   </div><!-- /.l-Contents_Block -->
  </article>

 </div><!-- /.l-Contents_Block -->
</template>
 
<script>
import { mapState } from 'vuex';

export default {
    name: 'UserRegister',
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

}
</script>
