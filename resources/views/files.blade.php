@extends('layouts.card_file')

@section('body')
<div>
    <v-row>
        @for ($i = 0; $i < 10; $i++)
            <card-file-component id={{$i}} name-file='Test {{$i}}' type-file=".ZIP {{$i}}" >
            </card-file-component>
        @endfor
    </v-row>
</div>

@endsection

