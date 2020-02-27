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
<div id="app">
    <!-- Navigation drawers -->
    <v-app>
        <v-navigation-drawer app
            permanent
        >
            <v-row class="fill-height" no-gutters>
                <v-navigation-drawer
                    dark
                    mini-variant
                    mini-variant-width="56"
                    permanent
                >
                    <v-list-item class="px-2">
                        <v-list-item-avatar>
                            <v-img src="https://randomuser.me/api/portraits/women/75.jpg"></v-img>
                        </v-list-item-avatar>
                    </v-list-item>

                    <v-divider></v-divider>

                    <v-list
                        dense
                        nav
                    >

                        <v-list-item link>
                            <v-list-item-action>
                                <v-icon>fas fa-ad</v-icon>
                            </v-list-item-action>

                            <v-list-item-content>
                                <v-list-item-title>Test</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-navigation-drawer>

                <v-list class="grow">
                    <v-list-item link>
                        <v-list-item-title>Test</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-row>
        </v-navigation-drawer>
        <v-content>
            <v-container fluid>
                @yield('content')
            </v-container>
        </v-content>
    </v-app>
</div>
</body>
</html>
