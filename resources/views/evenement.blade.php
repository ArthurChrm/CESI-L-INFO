@extends('layouts.app')

@section('body')
<h1>Evenements : </h1>
    @foreach($evenements as $evenement)
    <p>{{$evenement->name}}<p>
    
    @endforeach
@endsection