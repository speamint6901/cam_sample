<template>
    <div>
        <p v-show="isError">登録に失敗しました。</p>
        <form @submit.prevent="register">
            <h1>新規登録</h1>
            <p>メールアドレス: <input type="email" v-model="email"></p>
            <p>名前: <input type="text" v-model="name"></p>
            <p>パスワード: <input type="password" v-model="password"></p>
            <p>パスワード確認: <input type="password" v-model="password_confirmation"></p>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</template>
 
<script>
    import { mapActions } from 'vuex';

    export default {
        data () {
            return {
                isError: false,
                email: this.email,
                name: this.name,
                password: this.password,
                password_confirmation: this.password_confirmation
            }
        },
        methods: {
            register() {
                console.log(this.$store);
                this.$store.dispatch('register', {
                    email: this.email,
                    name: this.name,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                });
            }
        }
    }
</script>
