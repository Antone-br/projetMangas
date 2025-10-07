@extends("layouts.master")

@section("content")
    <form method="POST" action="{{ url('/validerManga') }}">
        {{ csrf_field() }}

        <h1>@if($equipe->numEqu)Modifier @else Ajout @endif d'une équipe</h1>
        <div class="col-md-12 card card-body bg-light"></div>

        <div class="form-group ">
            <label class="col-md-3 col-form-label" for="code">Code :</label>
            <div class="col-md-6">
                <input type="text" id="code" name="code" class="form-control" value="{{ $equipe->code }}" required>
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-3 col-form-label" for="libelle">Libelle :</label>
            <div class="col-md-6">
                <input type="text" id="libelle" name="libelle" value="{{ $equipe->libelle }}" class="form-control" required>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-3">Profil : Bous êtes</label>
            <div class="col-md-6">
                <select class="form-select" name="secteur">
                    <option value="admin" @if($equipe->secteur == 'admin') selected @endif>Admin</option>
                    <option value="vente" @if($equipe->secteur == 'vente') selected @else selected @endif>Vente</option>
                    <option value="prod" @if($equipe->secteur == 'prod') selected @endif>Prod</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="id" value="{{$equipe->numEqu}}">

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
