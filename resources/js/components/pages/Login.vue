<template>
    <div>
        <p v-show="isError">メールアドレスまたはパスワードが違います</p>
        <form @submit.prevent="login">
            <h1>ログイン</h1>
            メールアドレス: <input type="email" v-model="email">
            パスワード: <input type="password" v-model="password">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
    </div>
</template>
 
<script>

export default {
    computed: {
        email: {
            get: function () { return this.$store.getters.email },
            set: function (val) { this.$store.commit('updateEmail', val) }
        },
        password: {
            get: function () { return this.$store.getters.password },
            set: function (val) { this.$store.commit('updatePassword', val) }
        },
        loading: {
            get: function () { return this.$store.getters.loading },
            set: function (val) { this.$store.commit('updateLoading', val) }
        },
    },
    methods: {
        login() {
            this.loading = true;
            this.$store.dispatch('login', {
                    email: this.email,
                    password: this.password,
            });
        },
    },
}
</script>
