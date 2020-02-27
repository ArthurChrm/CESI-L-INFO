@extends('layouts.app')

@section('body') 
    <form action="/upload/add" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit">
    </form>
@endsection