@extends('layouts.app')

@section('body')
    <h1>Création d'un évènement</h1>

    <form method="POST" action="/evenement/add">
        @csrf
            {{-- @method("PUT") --}}
        
            <div class="form-example">
              <label for="message">Nom de l'évènement: </label>
              <input type="text" name="name" id="name" required>
            </div>
            <div class="form-example">
                <label for="message">Description de l'évènement: </label>
                <input type="text" name="description" id="description" required>
              </div>
            <div>
                <div class="form-example">
                    <label for="message">Description de l'évènement: </label>
                    <input type="date" name="date" id="date" required>
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