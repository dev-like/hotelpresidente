<!DOCTYPE html>
<html lang="pt-br"  class="no-js">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136456727-1"></script>
    <script>
      // window.dataLayer = window.dataLayer || [];
      // function gtag(){dataLayer.push(arguments);}
      // gtag('js', new Date());
      //
      // gtag('config', 'UA-136456727-1');


      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-136456727-1', {'allowAnchor': true});
      ga('send', 'pageview', { 'page': location.pathname + location.search + location.hash});
    </script>

    <!-- Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('metatags')
    <meta property="og:image" content="{{ asset('theme/images/favicon.png') }}">
    <meta property="og:url" content="http://www.hotelpresidenteitz.com.br">
    <meta name="author" content="Like Publicidade">

    <!-- Title Page-->
    <title>{{$empresa->nomefantasia}}</title>
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}">
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- Fonts e Animations -->
    <link rel="stylesheet" href="{{ asset('theme/css/lib/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/animates.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/fonts/fonts.css') }}">

    <!-- Styles Sheets -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/footer.css') }}">
    @yield('stylesheet')

    <!-- JS Library's -->
    <script src="{{ asset('theme/js/lib/jquery.min.js') }}" charset="utf-8"></script>
    @yield('jslibrary')
<head>
<body>

    @include('pages.partials.loader')

    @yield('body')

    @yield('script')

</body>
</html>
