@extends('layouts.app')

@section('body')
    <div>
        <v-row>
            @for ($i = 0; $i < 10; $i++)
                <v-col>
                    <card-file-component id="" name-file="" type-file="">
                    </card-file-component>
                </v-col>
            @endfor
        </v-row>
    </div>

@endsection

