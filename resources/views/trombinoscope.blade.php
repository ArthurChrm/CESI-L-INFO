@extends('layouts.app')

@section('body')
<div>
    <v-row>
        @foreach($users as $user)
        <v-col>
            <trombi-component
            name= {{ $user->name }}
            firstname= {{ $user->firstname }}
            email= {{ $user->email }}
            address = {{ $user->address }}
            telephone = {{ $user->phone_number }}
            >
            </trombi-component>
        </v-col>
        @endforeach
    </v-row>
</div>
@endsection
