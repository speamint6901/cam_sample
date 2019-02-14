<template>

 <article>

  <h1 class="u-Title_Article">新規登録</h1>

  <p class="" v-show="isError">登録に失敗しました。</p>

  <form @submit.prevent="register">

   <div class="c-Form_Parts">
    <label class="c-Form_Label" for="UserMail">メールアドレス</label>
    <input type="email" name="usermail" id="UserMail" class="c-Form_Input" v-model="email">
    <p>{{ getErrors.email }}</p>
   </div>

   <div class="c-Form_Parts">
    <label class="c-Form_Label" for="UserName">ユーザーネーム</label>
    <input type="text" name="username" id="UserName" class="c-Form_Input" v-model="name">
    <p>{{ getErrors }}</p>
   </div>

   <div class="c-Form_Parts">
    <label class="c-Form_Label" for="Password">パスワード</label>
    <input type="password" name="password" id="Password" class="c-Form_Input" v-model="password">
   </div>

   <div class="c-Form_Parts">
    <label class="c-Form_Label" for="PasswordConfirmation">パスワード確認</label>
    <input type="password" name="password_confirmation" id="PasswordConfirmation" class="c-Form_Input" v-model="password_confirmation">
   </div>

   <button type="submit" class="">登録</button>

  </form>
 </article>

</template>
 
<script>
    import { mapState } from 'vuex';

    export default {
        data () {
            return {
                errors: [],
                isError: false,
                email: this.email,
                name: this.name,
                password: this.password,
                password_confirmation: this.password_confirmation
            }
        },
        methods: {
            register() {
                this.$store.dispatch('register', {
                    email: this.email,
                    name: this.name,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                });
            },
        },
        computed: {
            getErrors () {
                return this.$store.getters.getErrors
            }
        },

    }
</script>
