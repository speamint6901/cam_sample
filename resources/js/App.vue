<template>
 <div class="l-Container">
  <page-header></page-header>


  <div class="l-Contents u-SiteSize">
   <div v-show="isLoading" class="c-Loader05">Loading..</div>
   <div v-show="!isLoading">
    <router-view></router-view>
   </div>
  </div><!--//.l-Contents-->

  <page-footer></page-footer>
 </div><!--//l-Container-->
</template>
 
 
<script>
import * as config from './config';
Vue.component('page-header', require('./components/object/component/Header.vue').default);
Vue.component('page-footer', require('./components/object/component/Footer.vue').default);

export default {
    created() {
        this.$store.dispatch('setAuthUser')
    },
    computed: {
        isLoading: {
            get: function () { return this.$store.getters.isLoading }
        }
    },
	mounted : function(){
	  var to = this.$route;
	  this.createPageTitle(to);
	},
	watch: { 
	  '$route' (to, from) {
		  this.createPageTitle(to);
	  }
	},
    methods : {
		createPageTitle : function(to){
			 // タイトルを設定
			if(to.meta.title){
				var setTitle = 'アウトドアギア大百科 Campbug | ' + to.meta.title;
				document.title = setTitle;
                document.querySelector("meta[name='description']").setAttribute('content', "")
                document.querySelector("meta[name='date']").setAttribute('content', "")
                document.querySelector("meta[property='og:title']").setAttribute('content', setTitle)
                document.querySelector("meta[property='og:description']").setAttribute('content', "")
                document.querySelector("meta[property='og:url']").setAttribute('content', config.assetDomain + to.path)
                document.querySelector("meta[property='og:image']").setAttribute('content', "")
			} else {
				document.title = 'アウトドアギア大百科 Campbug | '
			}

			// メタタグdescription設定
			if(to.meta.desc){
				var setDesc = to.meta.desc + ' | SourceAcademy';
				document.querySelector("meta[name='description']").setAttribute('content', setDesc)
			} else {
				document.querySelector("meta[name='description']").setAttribute('content', 'SourceAcademy')
			}
		} 
  } 
}
</script>
