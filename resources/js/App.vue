<template id="">
 <div>
  <ul class="">
   <li class=""><router-link to="/">ホーム</router-link></li>
   <li><router-link to="/login">ログイン</router-link></li>
   <li><router-link to="/register">ユーザー登録</router-link></li>
   <li><router-link to="/user">ユーザー情報</router-link></li>
  </ul>
  <hr>
  <router-view></router-view>
 </div>
</template>
 
 
<script>
/*
    export default {
        methods: {
            logout() {
                axios.get('/api/logout').then(res => {
                    state.isLogin = false;
                    this.$router.push({path: '/'});
                });
            }
        }
    }
*/
</script>
