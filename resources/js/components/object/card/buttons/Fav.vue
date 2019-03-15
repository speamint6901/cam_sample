<template>
<div class="c-ArticleCard_Status_Item">
 <i class="c-ArticleCard_Status-Icon">F.</i>
 <span class="c-ArticleCard_Status-Count" v-bind:disabled="isProcessing" @click="toggleFav({ id : gear.id, fav_count: fav_count, type: isFav })">{{ fav_count }}</span>
</div>
</template>

<script>
import * as config from './../../../../config';
import router from './../../../../router';

export default {
    name: 'GearStatus',
    props: ['gear'],
    data: function() {
        return {
            fav_count: this.gear.profile.fav_count,
            isFav: this.gear.fav_users_count,
            isProcessing: false
        }
    },
    methods: {
        toggleFav() {
             return new Promise((resolve, reject) => {
                this.isProcessing = true
                axios.post(config.toggleFav, {
                    gear_id: this.gear.id,
                    count: this.fav_count,
                    type: this.isFav,
                    notLoading: true,
                }).then(res => {
                    console.log(res)
                    this.fav_count = res.data.count
                    this.isFav = res.data.type
                    this.isProcessing = false
                    resolve();
                }).catch(error => {
                    console.log(error)
                    router.push({'path': '/login'});
                });
            });
        }
    }
}
</script>
