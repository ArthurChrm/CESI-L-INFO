@extends('layouts.app')

@section('body')
     <v-row style="height:100%">
     <v-img src="http://icon-library.com/images/unknown-person-icon/unknown-person-icon-16.jpg" max-height="20em" max-width="20em" contain></v-img>
        <v-row class="ml-9">
            <div style="display: flex; flex-direction: column; justify-content : start; height: 100%">
            <v-hover
                v-slot:default="{ hover }"
                open-delay="100"
                close-delay="100"
            >
                <v-card :elevation="hover ? 16 : 0" height="fit-content" width="fit-content" style="margin-top:5%">
                    <h1 class="m-2"> {{Auth::user()->name}}
                        <card-profile-change-component name="nom">
                        </card-profile-change-component>
                    </h1>                   
                </v-card>          
            </v-hover>
            <v-hover
                v-slot:default="{ hover }"
                open-delay="100"
                close-delay="100"
            >
                <v-card :elevation="hover ? 16 : 0" height="fit-content" width="fit-content" style="margin-top:5%">
                    <h1 class="m-2"> {{Auth::user()->first_name}}
                        <card-profile-change-component name="prénom">
                        </card-profile-change-component>
                    </h1>
                </v-card>
            </v-hover>
            <v-hover
                v-slot:default="{ hover }"
                open-delay="100"
                close-delay="100"
            >
                <v-card :elevation="hover ? 16 : 0" height="fit-content" width="fit-content" style="margin-top:5%">
                    <h2 class="m-2"> {{Auth::user()->email}}
                        <card-profile-change-component name="adresse mail">
                        </card-profile-change-component>
                    </h2>
                </v-card>
            </v-hover>
            <v-card :elevation="0" height="fit-content" width="fit-content" style="margin-top:5%">
                    <h2 class="m-2">Inconnu</h2>
            </v-card>
            <v-card :elevation="0" height="fit-content" width="fit-content" style="margin-top:5%">
            <h2 class="m-2"> {{Auth::user()->created_at}} </h2>
            </v-card>           
            </div>
        </v-row>
     </v-row>

@endsection
