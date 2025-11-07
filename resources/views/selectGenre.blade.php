@extends("layouts.master")

@section("content")
    <form method="POST" action="{{ url('/validGenre') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <h1>Filtrer les mangas par genre</h1>
        <div class="col-md-12 card card-body bg-light"></div>


        <div class="form-group ">
            <label for="genre">Genre :</label>
            <select name="genre" id="genre" class="form-select @error('genre') border-danger @enderror">
                <option value="" disabled {{ empty($manga->id_genre) ? 'selected' : '' }}>Sélectionner un genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id_genre }}" @if($manga->id_genre == $genre->id_genre) selected @endif>
                        {{ $genre->lib_genre }}
                    </option>
                @endforeach
            </select>

        </div>




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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
