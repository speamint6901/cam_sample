<template>
<div class="c-ArticleCard_Status_Item">
 <i class="c-ArticleCard_Status-Icon">W.</i>
 <span class="c-ArticleCard_Status-Count" v-bind:disabled="isProcessing" @click="toggleWant({ id : gear.id, want_count: want_count, type: isWant })">{{ want_count }}</span>
</div>
</template>

<script>
import * as config from './../../../../config';

export default {
    name: 'GearStatus',
    props: ['gear'],
    data: function() {
        return {
            want_count: this.gear.profile.want_count,
            isWant: this.gear.want_users_count,
            isProcessing: false
        }
    },
    methods: {
        toggleWant() {
            return new Promise((resolve, reject) => {
                this.isProcessing = true
                axios.post(config.toggleWant, {
                    gear_id: this.gear.id,
                    count: this.want_count,
                    type: this.isWant,
                    notLoading: true,
                }).then(res => {
                    console.log(res)
                    this.want_count = res.data.want_count
                    this.isWant = res.data.type
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
