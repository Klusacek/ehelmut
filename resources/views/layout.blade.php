<html lang="cs">
<head>
  <!-- Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Stanka info -->
  <title>{{$siteName}}</title>
  <link rel="stylesheet" type="text/css" href="{{asset('/css/semantic.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/moje.css')}}">

  <script src="{{asset('/js/jquery.min.js')}}"></script>
  <script src="{{asset('/js/semantic.js')}}"></script>
  <script src="{{asset('/js/moje.js')}}"></script>
</head>

<body>



<!-- Sidebar Menu -->
@include('partials._side_menu')


<!-- stranka Contents -->
<div class="pusher">
    
    @include('partials._top_menu')
    <div class="siteContent ui container">
      @include('partials._breadcrumb')
      @yield('content')
    </div>



{{-- footer --}}
  <div class="ui inverted vertical footer segment">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
      <h3>František -  {{ date('d-m-Y',time())}}</h3>

      </div>
    </div>
  </div>
{{-- end footer --}}
</div>

</body>
</html>