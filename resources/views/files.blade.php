@extends('layouts.app')

@section('body')
    <div>
        <v-row>
            @foreach($fichiers as $fichier)
                <v-col>
                    <card-file-component 
                    id={{$fichier->id}}
                    name-file={{$fichier->link}}
                    type-file="Type inconnu"
                    size-file="Taille inconnue"
                    date-file="{{$fichier->created_at}}"
                    transmitter="test">
                    </card-file-component>
                </v-col>
            @endforeach
        </v-row>
    </div>

@endsection

