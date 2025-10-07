<link href="{{ url('assets/css/mangas.css') }}" rel="stylesheet">

@extends('layouts.master')

@section('content')
    <h1>Liste des mangas du genre Action</h1>
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
                <a href="{{url('/')}}"><i class="bi bi-pencil"></i></a>
            </td>
            <td>
                <a onclick="return confirm('Supprimer ce manga ?')"
                   href="{{url('/')}}"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        @endforeach

    </table>
@endsection
