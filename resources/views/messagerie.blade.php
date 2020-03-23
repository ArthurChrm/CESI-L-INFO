@extends('layouts.app')

@section('body')
    <messagerie-component salon_id="{{$salon->id}}" user_id="{{Auth::user()->id}}"></messagerie-component>
@endsection
