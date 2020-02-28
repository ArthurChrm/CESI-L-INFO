@extends('layouts.card_event')

@section('body')
<div>
    <v-row>
        @for ($i = 0; $i < 10; $i++)
        <v-col>
            <card-event-component title-event="Titre de l'évènement {{$i}}" date-event="25/02/2021" desc-event="Description de l'évènement">
            </card-event-component>
        </v-col>
        @endfor
    </v-row>
</div>

@endsection
