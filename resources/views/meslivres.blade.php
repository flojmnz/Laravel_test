@extends('index')
@section('section')
    <h2>Liste de mes livres</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titre</th>
                <th scope="col">Résumé</th>
                <th scope="col">Prix du livre</th>
                <th scope="col">Categorie</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livres as $livre)
                <tr>
                    <th scope="row">{{ $livre->id }}</th>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->resume }}</td>
                    <td>{{ $livre->prix }} €</td>
                    @foreach ($categories as $categorie)
                    @if ($livre->categorie_id == $categorie->id)
                    <td>{{ $categorie->libelle }}</td>
                    @endif
                    @endforeach
                    <td style="display: flex; flex-direction: row;">
                        <form action="modif">
                            <input type="hidden" name="id" value="{{ $livre->id }}">
                            <button style="margin-inline: 10px;" type="submit" name="modif" class="btn btn-warning">Modifier</button>
                        </form>
                        <form action="supprimer">
                            <input type="hidden" name="id" value="{{ $livre->id }}">
                            <button style="margin-inline: 10px;" type="submit" class="btn btn-danger"> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
