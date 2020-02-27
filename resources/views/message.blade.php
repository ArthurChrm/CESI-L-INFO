@extends('layouts.app')

@section('body')
<div>
    <p>Messages : </p>

    @foreach ($messages as $item)
        <p>{{$item->content}}</p>
        @foreach ($item->fichiers as $fichier)
            <p>{{$fichier->link}}</p>
        @endforeach
    @endforeach
</div>
@endsection