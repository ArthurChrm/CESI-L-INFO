{{-- Load the layout which contains the navbar --}}
@extends('layouts.app')

@section('body')
{{-- The layout of the trombinoscope --}}
<div max-width="100%"  max-height="100%">
    {{-- The container with contains row --}}
    <v-container  class="grey lighten-5">
        {{-- Row with 4 cols --}}
        <v-row class="fill-height" >
            {{-- Get all user from database --}}
            @foreach($users as $user)
            {{-- Foreach we create a col containing the cards (image name and firstname) --}}
            <v-col
            cols="4"
            sm="2"
            >
                {{-- Load the vue component with user's name, firstname --}}
                <trombi-component
                Name= "{{ $user->name }}"
                First= "{{ $user->first_name }}"
                Address = "{{ $user->address }}"
                Telephone = "{{ $user->phone_number }}"
                >
                </trombi-component>
            </v-col>
            @endforeach
        </v-row>
    </v-container>
</div>
@endsection
