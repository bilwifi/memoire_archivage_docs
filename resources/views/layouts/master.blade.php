<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Bil Wifi" content="{{ config('app.name') }} by KinDev">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty ($title) ? $title .' | '. config('app.name') : config('app.name') }}  </title>
    <!-- Fonts -->
    {{-- <link href = "https://fonts.googleapis.com/css?family= Roboto " rel = "stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
    {{-- Styles --}}
    {{-- <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet"> --}}
    <style type="text/css">
        body{
            margin: 5%;
            background-image: url({{ asset('img/cover.jpg')}});
            background-repeat : repeat;
            background-position: center;
            background-color: #131517;
        }
        .bg-purple { background-color: #6f42c1; }
    </style>
    @yield('stylesheet')
    @stack('stylesheets')

</head>

<body class="text-monospace">
    <div class="container" style="margin-top: -50px">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-danger rounded shadow-sm">
        <img class="mr-3" src="{{ asset('img/default-profil.png') }}" alt="" width="48" height="48">
        <div class="lh-100 text-monospace">
          <h6 class="mb-0 text-white lh-100">ARCHIVAGE DES DOCUMENTS</h6>
          {{-- <small>République Démocrarique du Congo</small> --}}
        </div>
      </div>
        @yield('content')
         @auth('web')
        <small class="d-block text-right mt-3">
          <a href="{{ route('home') }}">Accueil</a>
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              Déconnexion
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </small>
        @else
        @if(!auth('admin')->check())
          <small class="d-block text-right mt-3">
          {{-- <a href="/">Accueil</a> --}}
          <a href="{{ route('login') }}">Connexion</a>
        </small>
        @endif
        @endauth
        @auth('admin')
        <small class="d-block text-right mt-3">
          <a href="{{ route('admin.index') }}">Accueil</a>
          <a href="{{ route('admin.logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              Déconnexion
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </small>
        @endauth
    </div>
     
    {{-- Container   --}}
    
    {{-- Session Flash --}}
    @yield('msg_flash')
    <footer class="footer">
        @yield('footer')
        <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- <script src="dist/js/jquery.ui.touch-punch-improved.js"></script>
        <script src="dist/js/jquery-ui.min.js"></script> -->
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
         {{-- <script type="text/javascript" src="{{ asset('dataTables/datatables.min.js') }}"></script> --}}
        @yield('script')
        @stack('scripts')
        @include('flashy::message')

    </footer>
</body>
</html>