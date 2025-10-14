@extends("layouts.master")

@section("content")
    <form method="POST" action="{{ url('/validManga') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <h1>@if($manga->numEqu)Modifier @else Ajout @endif d'une équipe</h1>
        <div class="col-md-12 card card-body bg-light"></div>

        <div class="form-group ">
            <label class="col-md-3 col-form-label" for="code">Titre :</label>
            <div class="col-md-6">
                <input type="text" id="titre" name="titre" class="form-control" value="{{ $manga->titre }}" required>
            </div>
        </div>

        <div class="form-group ">
            <label for="genre">Genre :</label>
            <select name="genre" id="genre" class="form-select">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id_genre }}" @if($manga->id_genre == $genre->id_genre) selected @endif>
                        {{ $genre->lib_genre }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="form-group ">
            <label for="dess">Dessinateur :</label>
            <select name="dess" id="dess" class="form-select">
                @foreach($dessinateurs as $dessinateur)
                    <option value="{{$dessinateur->id_dessinateur}}" @if($manga->id_dessinateur == $dessinateur->id_dessinateur) selected @endif>
                        {{$dessinateur->nom_dessinateur}} {{$dessinateur->prenom_dessinateur}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group ">
            <label for="scen">Scenariste :</label>
            <select name="scen" id="scen" class="form-select">
                @foreach($scenaristes as $scenariste)
                    <option value="{{$scenariste->id_scenariste}}" @if($manga->id_scenariste == $scenariste->id_scenariste) selected @endif>
                        {{$scenariste->nom_scenariste}} {{$scenariste->prenom_scenariste}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group ">
            <label class="col-md-3 col-form-label" for="code">prix :</label>
            <div class="col-md-6">
                <input type="text" id="prix" name="prix" class="form-control" value="{{ $manga->prix }}" required>
            </div>
        </div>
        <div class="form-group ">
            <label class="col-md-3" for="couv">Couverture :</label>
            <div class="col-md-6">
                <input type="hidden"name="MAX_FILE_SIZE" value="204800">
                <input type="file" id="couv" name="couv" accept="image/*" class="form-control" required>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$manga->id_manga}}">


        <input type="hidden" name="id" value="{{$manga->numEqu}}">

        <div class="form-group">
            <div class="col-md-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
                <button type="button" class="btn btn-secondary"
                        onclick="if (confirm('Annuler la saisie ?')) window.location='{{ url('/') }}'; ">
                    Annuler
                </button>
            </div>
        </div>
    </form>
@endsection
