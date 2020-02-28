@extends('layouts.app')

@section('body')
<div>
    <v-row>
        @foreach($users as $user)
        <v-col>
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
</div>
@endsection
