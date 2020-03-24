<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @if(\Auth::check())
        <p><strong>Prenom/Nom: </strong>{{ Auth::user()->name }} <strong>id:</strong> {{ Auth::user()->id }}</p>
        {{-- <p></p> --}}
        <form action="/logout" method="POST">
            @csrf
            <input type="submit" value="Se déconnecter">
          </form>
    @endif

<div id="app" v-cloak>
    <v-app>
        <!-- Navigation -->
        <nav-component 
        @if (\Auth::check())
            fullname={{\Auth::user()->name}}
            email={{\Auth::user()->email}}
        @else
            fullname="Pas connecté"
            email="Pas connecté"
        @endif        
        >
        
        </nav-component>
        <!-- Page content -->
        <v-content fluid>
            <v-container class="fill-height">
                @yield('body')
            </v-container>
        </v-content>
    </v-app>
</div>

</body>
</html>
