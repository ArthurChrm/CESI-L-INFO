@extends('layouts.app')

@section('body')
    <div>
        <v-row>
            @foreach($evenements as $evenement)
                <v-col>
                    <card-event-component title-event="{{$evenement->name}}" date-event="{{$evenement->date}}" desc-event="{{$evenement->description}}">
                    </card-event-component>
                </v-col>
            @endforeach
        </v-row>
    </div>
@endsection
