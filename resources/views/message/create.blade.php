@extends('layouts.app')

@section('body')

<form method="POST" action="/message">
@csrf
    {{-- @method("PUT") --}}

    <div class="form-example">
      <label for="message">Message: </label>
      <input type="text" name="message" id="message" required>
    </div>
    <div>
      <input type="submit" value="Envoyer">
    </div>
  </form>
  
@endsection