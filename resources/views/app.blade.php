<!doctype html>
<html lang="ja">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
  <title>Campbug</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="https://use.typekit.net/vtq3xtc.css">
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  @yield('p-css')
  @yield('p-js')
  <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>

 <body>
  <div class="l-Container">


  <div id="app">
   <app></app>
  </div>

  <script src="{{ mix('/js/app.js') }}"></script>

  </div><!--//l-Container-->
 </body>
</html>
