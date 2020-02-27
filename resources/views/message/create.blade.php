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
      @foreach($salons as $salon)
        <div>
          <input type="radio" id="salon" name={{$salon->salon_name}} value={{$salon->id}}
                 checked>
          <label for="{{$salon->salon_name}}">{{$salon->salon_name}}</label>
        </div>
      @endforeach
    </div>
    <div>
      <input type="submit" value="Envoyer">
    </div>
  </form>
  
@endsection