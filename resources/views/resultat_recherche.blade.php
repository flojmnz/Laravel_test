@extends('index')
@section('section')
<h2>Résultat de la recherche</h2>
@if (count($livres) == 0)
<p>Pas de livre trouvé<p>
@else
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Titre</th>
      <th scope="col">Résumé</th>
      <th scope="col">Prix du livre</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($livres as $livre)
    <tr>
      <th scope="row">{{ $livre->id }}</th>
      <td>{{ $livre->titre }}</td>
      <td>{{ $livre->resume }}</td>
      <td>{{ $livre->prix }} €</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@stop