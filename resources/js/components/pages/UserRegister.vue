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
      <span class="c-Form_Validation" v-if="ur_errors && ur_errors.email">{{ ur_errors.email }}</span>
     </div>

     <div class="c-Form_Parts">
      <label class="c-Form_Label" for="UserName">ユーザーネーム</label>
      <input type="text" name="username" id="UserName" class="c-Form_Input" v-model="name">
      <span class="c-Form_Validation" v-if="ur_errors && ur_errors.name">{{ ur_errors.name }}</span>
     </div>

     <div class="c-Form_Parts">
      <label class="c-Form_Label" for="Password">パスワード</label>
      <input type="password" name="password" id="Password" class="c-Form_Input" v-model="password">
     </div>

     <div class="c-Form_Parts u-Margin _mgBottom-base05">
      <label class="c-Form_Label" for="PasswordConfirmation">パスワード確認</label>
      <input type="password" name="password_confirmation" id="PasswordConfirmation" class="c-Form_Input" v-model="password_confirmation">
      <span class="c-Form_Validation" v-if="ur_errors && ur_errors.password">{{ ur_errors.password }}</span>
     </div>

     <div class="c-Form_Parts">
      <input type="checkbox" name="policy" id="idch01" v-model="policy" value="1" class="c-Form_Input -Checkbox">
      <label class="c-Form_Label -CheckBox u-Text_Main-S" for="idch01">
       <a href="" class="u-TxtColor_Main">利用規約</a>と<a href="" class="u-TxtColor_Main">プライバシーポリシー</a>に同意する
      </label>
      <span class="c-Form_Validation" v-if="ur_errors && ur_errors.policy">{{ ur_errors.policy }}</span>
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
    methods: {
        register() {
            this.loading = true;
            this.$store.dispatch('register', {
                email: this.email,
                name: this.name,
                password: this.password,
                password_confirmation: this.password_confirmation,
                policy: this.policy,
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
        policy: {
            get: function () { return this.$store.getters.policy },
            set: function (val) { this.$store.commit('updatePolicy', val) }
        },
        loading: {
            get: function () { return this.$store.getters.loading },
            set: function (val) { this.$store.commit('updateLoading', val) }
        },
        ur_errors: {
            get: function () { return this.$store.getters.ur_errors },
        },
    },

}
</script>
