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




  <style type="text/css">
    .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
  </style>


</head>


    <body>
        <div class="ui middle aligned center aligned login grid">
            <div class="column">
                <img src="assets/images/logos/hanak-logo-ateliery.svg" class="ui image">
                <form action="{{route('login.post')}}" method="POST" class="ui large form">
                    @csrf
                    <div class="ui stacked segment">
                      <div class="field">
                        <div class="ui left icon input">
                          <i class="user icon"></i>
                          <input type="text" name="email" placeholder="E-mail" value="{{old('email')}}">
                        </div>
                      </div>
                      <div class="field">
                        <div class="ui left icon input">
                          <i class="lock icon"></i>
                          <input type="password" name="password" placeholder="Heslo">
                        </div>
                      </div>
                      <input type="submit" class="ui fluid large teal submit button"/>
                    </div>
                  </form>

                @if ($errors->any())
                  <div class="ui error message">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>   
                @endif

            </div>
        </div>
    </body>