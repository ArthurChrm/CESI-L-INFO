@extends('layouts.card_file')

@section('body')
    <v-card
    class="mx-auto"
    max-width="30em"
    outlined>
        <v-card-title>
            Nom du fichier rhjfjhdshfhjgdshjjhgjhg
        </v-card-title>
        <v-card-subtitle>
            Infos du fichier (type, taille etc...)
        </v-card-subtitle>
        <v-card-actions class="d-flex flex-column pa-0" width="100%" >
            <v-btn width="100%" class="blue darken-2">
                <div>
                    <i class="fas fa-question-circle" size=3x></i>
                    Plus d'infos
                </div>
            </v-btn>
            <v-btn width="100%" class="teal lighten-1 ma-0">
                <div>
                    <i class="fas fa-file-download" size="3x"></i>
                    Télécharger
                </div>
            </v-btn>
        </v-card-actions>
    </v-card>
@endsection

