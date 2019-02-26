<template>
    <div class="text_logout">
        ログアウトしました。
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: 'logout',
        created() {
            window.localStorage.removeItem("jwt-token");
            this.$store.dispatch('logoutRequest');
        },
    }
</script>
<style>
    .text_logout{
        padding: 30px;
        text-align: center;
    }
</style>