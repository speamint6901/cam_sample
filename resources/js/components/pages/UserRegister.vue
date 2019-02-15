<template>

 <article>

  <h1 class="u-Title_Article">新規登録</h1>

  <form @submit.prevent="register">

   <div class="c-Form_Parts">
    <label class="c-Form_Label" for="UserMail">メールアドレス</label>
    <input type="email" name="usermail" id="UserMail" class="c-Form_Input" v-model="email">
    <span class="help-block" v-if="errors">{{ errors }}</span>{{ errors }}</span>
   </div>

   <div class="c-Form_Parts">
    <label class="c-Form_Label" for="UserName">ユーザーネーム</label>
    <input type="text" name="username" id="UserName" class="c-Form_Input" v-model="name">
    <span class="help-block" v-if="errors">{{ errors }}</span>{{ errors }}</span>
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
        name: 'UserRegister',
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
            ...mapState({
                errors: state => state.UserRegister.errors
            }),
        },

    }
</script>
