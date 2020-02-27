@extends('layouts.app')

@section('body')
<div>
    <p>Messages : </p>

    @foreach ($messages as $item)
        <p>{{$item->content}}</p>
    @endforeach
</div>
@endsection