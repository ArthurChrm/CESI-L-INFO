@extends('layouts.app')

@section('body')

<form method="POST" action="/message" enctype="multipart/form-data">
@csrf
    {{-- @method("PUT") --}}

    <div class="form-example">
      <div>
      <label for="message">Message: </label>
      <input type="text" name="message" id="message" required>
      <div>
    </div>
    <div>
      @foreach($salons as $salon)
        <div>
          <input type="radio" id="salon" name={{$salon->salon_name}} value={{$salon->id}}
                 checked>
          <label for="{{$salon->salon_name}}">{{$salon->salon_name}}</label>
        </div>
      @endforeach
      <div>
        <p>Insertion d'un fichier (optionnel) : </p>
      <input type="file" name="file">
    </div>
    <div>
<p>Insertion d'un évènement (optionnel) : </p>
<label for="message">Nom de l'évènement: </label>
              <input type="text" name="name_event" id="name_event">
            </div>
            <div class="form-example">
                <label for="message">Description de l'évènement: </label>
                <input type="text" name="description_event" id="description_event">
              </div>
            <div>
                <div class="form-example">
                    <label for="message">Date de l'évènement: </label>
                    <input type="date" name="date_event" id="date_event">
                  </div>
                <div>
            </div>
    </div>
    <div>
      <input type="submit" value="Envoyer">
    </div>
  </form>
  
@endsection