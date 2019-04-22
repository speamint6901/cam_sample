<template>
 <div class="c-MenuModal">
  <div class="c-Modal_Bg"></div>

  <div v-show="isLoading" class="c-Loader05">Loading..</div>
  <div v-show="!isLoading" class="c-MenuModal_Contents">

   <button class="c-MenuModal_Close" @click="hideModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="c-MenuModal_Close-Img">
     <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    </svg>
   </button>

   <header class="c-MenuModal_Header">
    <h2 class="u-Text_Main-L u-TxAlign-Center p-CategoryList-Title">Category List</h2>
   </header>

   <section v-for="big_category in category_list" class="p-CategoryList-Block">
    <h3 class="p-CategoryList-Block_Label">{{ big_category.name }}<span class="p-CategoryList-Count">{{ big_category.gears_count }}</span></h3>
    <ul class="p-CategoryList-Categorys">
     <li v-for="category in big_category.categories"class=" p-CategoryList-Categorys-Name">{{ category.name }}<span class="p-CategoryList-Count">{{ category.gear_count }}</span>
      <input v-if="category.genres.length" id="Genre1" class="p-CategoryList-Genre-Check" type="checkbox">
      <label v-if="category.genres.length" class="p-CategoryList-Genre-Label" for="Genre1"></label>
      <div v-if="category.genres.length" class="p-CategoryList-Genre_Contents">
       <li v-for="genre in category.genres" class="p-CategoryList-Genre-Name">{{ genre.name }}<span class="p-CategoryList-Count">{{ genre.gears_count }}</span></li>
      </div>
     </li>

    </ul>
   </section>

  </div><!--//.c-MenuModal_Contents-->

 </div><!--//.c-MenuModal-->
</template>

<script>
import * as config from './../../../config';
import store from './../../../store/index.js';
import { mapState, mapActions } from 'vuex';
import SearchModalMixin from '../../../mixins/SearchModalMixin.js'

export default {
    mixins: [SearchModalMixin],
    computed: {
        ...mapState('Search', ['filter', 'sort', 'onFilter', 'onSort', 'category_list']),
    },
    methods: {
    }
}
</script>
