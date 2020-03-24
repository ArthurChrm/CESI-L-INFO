@extends('layouts.app')

@section('body')
 <div>
     <v-row>
        <v-img src="https://randomuser.me/api/portraits/women/75.jpg" max-height="20em" max-width="20em" contain></v-img>
        <v-row class="ml-9">
            <div style="display: flex; flex-direction: column; justify-content : space-evenly;">
            <v-hover
                v-slot:default="{ hover }"
                open-delay="100"
                close-delay="100"
            >
                <v-card :elevation="hover ? 16 : 0" height="fit-content" width="fit-content">
                    <h1 class="m-2">CORGNIARD 
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
                <v-card :elevation="hover ? 16 : 0" height="fit-content" width="fit-content">
                    <h1 class="m-2">Antoine
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
                <v-card :elevation="hover ? 16 : 0" height="fit-content" width="fit-content">
                    <h2 class="m-2">antoine.corgniard@viacesi.fr
                        <card-profile-change-component name="adresse mail">
                        </card-profile-change-component>
                    </h2>
                </v-card>
            </v-hover>
            <v-card :elevation="0" height="fit-content" width="fit-content">
                    <h2 class="m-2">RIL</h2>
            </v-card>
            <v-card :elevation="0" height="fit-content" width="fit-content">
                <h2 class="m-2">Compte crée le XX/XX/XX </h2>
            </v-card>           
            </div>
        </v-row>
     </v-row>
 </div>

@endsection
