<link href="{{ url('assets/css/mangas.css') }}" rel="stylesheet">

@extends('layouts.master')

@section('content')
    @if(isset($titre))
        <h1>{{ $titre }}</h1>
    @elseif(count($mangas) === 0)
        <h1>Aucun manga trouvé</h1>
    @elseif($mangas->pluck('lib_genre')->unique()->count() === 1)
        <h1>Liste des mangas du genre {{ $mangas->first()->lib_genre }}</h1>
    @else
        <h1>Liste de tous les mangas</h1>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Couverture</th>
            <th>Titre</th>
            <th>Genre</th>
            <th>Dessinateur</th>
            <th>Scénariste</th>
            <th>Prix</th>
            <th><i class="bi bi-pencil"></i></th>
            <th><i class="bi bi-trash"></i></th>


        </tr>
        </thead>

        @foreach($mangas as $manga)
        <tr>
            <td>
                <img class="img-thumbnail" src="{{ url('assets/images/' . $manga->couverture) }}">
            </td>

            <td>
                <div>{{$manga->titre}}</div>
            </td>

            <td>
                <div>{{$manga->lib_genre}}</div>
            </td>

            <td>
                <div>{{$manga->nom_dessinateur}}</div>
            </td>

            <td>
                <div>{{$manga->nom_scenariste}}</div>
            </td>

            <td>
                <div>{{$manga->prix}}</div>
            </td>

            <td>
                <a href="{{ route('editManga', $manga->id_manga) }}"><i class="bi bi-pencil"></i></a>
            </td>
            <td>
                <a href="{{ route('removeManga', $manga->id_manga) }}" onclick="return confirm('Supprimer ce manga ?')">
                    <i class="bi bi-trash"></i>
                </a>

            </td>
        </tr>
        @endforeach

    </table>
    @if(isset($erreur))
        <div class="alert alert-danger" role="alert">{{$erreur}}</div>
    @endif
@endsection
