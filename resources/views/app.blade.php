<!doctype html>
<html lang="ja">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
  <title>Campbug</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="https://use.typekit.net/vtq3xtc.css">
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



  <div id="app">
   <app></app>
  </div>

  <script src="{{ mix('/js/app.js') }}?ver={{ time() }}"></script>

 </body>
</html>
