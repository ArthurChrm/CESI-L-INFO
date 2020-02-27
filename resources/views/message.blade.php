@extends('layouts.app')

@section('body')
<div>
    <p>Messages : </p>

    @foreach ($messages as $item)
        <p>{{$item->content}}</p>
        @foreach ($item->fichiers as $fichier)
            <p>[FICHIER] {{$fichier->link}}</p>
        @endforeach

        @foreach ($item->evenements as $evenement)
            <p>[EVENEMENT] {{$evenement->name}}</p>
        @endforeach
    @endforeach
</div>
@endsection