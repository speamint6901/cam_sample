<template>
 <div class="c-MenuModal">
  <div class="c-MenuModal_Bg"></div>

  <div class="c-MenuModal_Contents">

   <div class="c-MenuModal_Sticky">
    <button class="c-MenuModal_Close" @click="hideModal">
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="c-MenuModal_Close-Img">
      <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
     </svg>
    </button>

    <header class="c-MenuModal_Header">
     <h2 class="u-Text_Main-L u-TxAlign-Center p-BrandList-Title">BRAND</h2>
    </header>

    <nav class="p-BrandList-Nav">
     <ul class="p-BrandList-Nav_Menu">
      <li v-for="brand_group in brand_list" class="p-BrandList-Nav_Item">
       <a :href="'#' + brand_group.name" class="u-TxtColor_Txt">{{ brand_group.name }}</a>
      </li>
     </ul>
    </nav>

   </div><!-- /.c-MenuModal_Sticky -->

   <div v-show="isLoading" class="c-Loader05">Loading..</div>

   <div v-show="!isLoading" class="c-MenuModal_Body">


    <section v-for="brand_group in brand_list" class="p-BrandList-Block">
     <a :id="brand_group.name" class="p-BrandList-Anchor"></a>
     <h3 class="p-BrandList-Block_Label">{{ brand_group.name }}</h3>
     <ul v-if="brand_group.brands.length" class="p-BrandList-Brand">
      <li v-for="brand in brand_group.brands" class="p-BrandList-Brand_Name">
       <a href="#" @click.prevent.stop="doBrandSearch(brand.id)" class="u-TxtColor_Txt">{{ brand.name }}</a>
       <span class="p-BrandList-Brand_Count">{{ brand.gears_count }}</span>
      </li>
     </ul>
    </section>

   </div><!--//c-MenuModal_Body-->

  </div><!--//.c-MenuModal_Contents-->

 </div><!--//.c-MenuModal-->
</template>

<script>
import * as config from './../../../config';
import router from './../../../router';
import store from './../../../store/index.js';
import { mapState, mapActions } from 'vuex';
import SearchModalMixin from '../../../mixins/SearchModalMixin.js'

export default {
    mixins: [SearchModalMixin],
    computed: {
        ...mapState('Search', ['filter', 'sort', 'onFilter', 'onSort', 'brand_list']),
        isLoading: {
            get: function () { return this.$store.getters.isLoading }
        }
    },
    methods: {
        ...mapActions('Search', ['getInitialGears']),
        doBrandSearch(brand_id) {
            this.$store.commit('setLoading', true)
            this.$store.commit('Search/setOnFilter', 1)
            this.$store.commit('Search/setBrandId', brand_id)
            this.$store.commit('Search/hideModal')
            this.getInitialGears();
            router.push({'path': '/'});
        }
    }
}
</script>
