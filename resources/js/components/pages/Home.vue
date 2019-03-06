<template>
  <div class="l-Contents_Block">
   <div class="l-Feed">
   <card-article></card-article>
   </div><!--//.l-Feed-->
  </div><!-- /.l-Contents_Block -->
</template>

<script>
import CardArticle from '../object/card/Article.vue';
export default {
    components: {
        'card-article': CardArticle
    }
}
</script>
