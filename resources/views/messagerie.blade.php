@extends('layouts.app')

@section('body')
    <v-card
        height="90%"
        outlined
        width="100%"
    >
        Test
    </v-card>

    <!-- Message text field -->
    <v-row class="ml-1">
        <v-text-field
            outlined
            clearable
            hide-details>

        </v-text-field>
        <v-btn height="auto" class="m-0">
            <v-icon>fa-paper-plane</v-icon>
        </v-btn>
    </v-row>

@endsection
