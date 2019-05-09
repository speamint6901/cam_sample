<!doctype html>
<html lang="ja">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
  <title>アウトドアギアを愛でる。Campbug｜{$BrandName} {$GearName}</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta name="format-detection" content="telephone=no">

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                                                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
     'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                              })(window,document,'script','dataLayer','GTM-KL362DC');</script>
  <!-- End Google Tag Manager -->

  <meta property="og:url" content="{ページのURL}" />
  <meta property="og:title" content="{ページのタイトル}" />
  <meta property="og:type" content="website">
  <meta property="og:description" content="{記事の抜粋}" />
  <meta property="og:image" content="(画像のURL}" />

  <meta name="twitter:card" content="summarylargeimage" />
  <meta name="twitter:site" content="@Campbug_Outdoor" />

  <meta property="og:site_name" content="Campbug" />
  <meta property="og:locale" content="ja_JP" />
  <meta property="fb:app_id" content="658430184592123" />

  <meta name="msapplication-square150x150logo" content="{{ asset('img/favicon/site-tile-150x150.png') }}">
  <meta name="msapplication-square310x310logo" content="{{ asset('img/favicon/site-tile-310x310.png') }}">
  <meta name="msapplication-TileImage" content="画像のURL" />
  <meta name="msapplication-TileColor" content="#FCFBF9">
  <meta name="theme-color" content="#FCFBF9">

  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}">
  <link rel="apple-touch-icon-precomposed" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon-180x180.png') }}" />
  <link rel="mask-icon" href="{{ asset('img/favicon/safari-icon.svg') }}" color="#FCFBF9" />
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon/android-chrome-192x192.png') }}">
  <link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">


  <script>
(function(d) {
 var config = {
  kitId: 'wwa5tjo',
  scriptTimeout: 3000,
  async: true
 },
     h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
})(document);
  </script>
  <link rel="stylesheet" href="https://use.typekit.net/vtq3xtc.css">
  <link href="{{ mix('/css/app.css') }}?ver={{ time() }}" rel="stylesheet">
  <script type="text/javascript">
    window.Laravel = window.Laravel || {};
    window.Laravel.csrfToken = "{{csrf_token()}}";
    window.Laravel.domain = "{{ url('/') }}";
  </script>
  @yield('p-css')
  @yield('p-js')
  <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>

 <body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KL362DC"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <div id="app">
   <app></app>
  </div>

  <script src="{{ mix('/js/app.js') }}?ver={{ time() }}"></script>

 </body>
</html>
