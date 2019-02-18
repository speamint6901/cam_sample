<template>

 <article class="">

  <div class="l-Contents_Block">
   <h1 class="c-Aricle_Hedding u-Hedding_Page u-TxAlign-Center">ログイン</h1>

   <p v-show="isError">認証に失敗しました。</p>

   <form @submit.prevent="login">

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
/*
export default {
    data () {
        return {
            isError: false,
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.post('/api/login', {
                email: this.email,
                password: this.password
            }).then(res => {
                const token = res.data.access_token;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                state.isLogin = true;
                this.$router.push({path: '/'});
            }).catch(error => {
                this.isError = true;
            });
        }
    }
}
*/
</script>
