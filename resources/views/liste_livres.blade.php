@extends('index')
@section('section')
<h2>Liste de tous les livres</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Titre</th>
      <th scope="col">Résumé</th>
      <th scope="col">Prix du livre</th>
      <th scope="col">Categorie</th>
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
    </tr>
    @endforeach
  </tbody>
</table>
@stop
