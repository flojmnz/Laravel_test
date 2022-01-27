@extends('index')
@section('section')
<h2>Formulaire pour modifier un livre</h2>
<form action="modification" method="get">
 <div class="mb-3">
 <label for="titre" class="form-label">Titre du livre</label>
 <input type="hidden" id="id" name="id" value="{{ $livre->id }}">
 <input type="text" class="form-control" id="titre" name="titre" ariadescribedby="titre" value="{{ $livre->titre }}">
 </div>
 <div class="mb-3">
 <label for="resume" class="form-label">Resumé</label>
 <input type="text" class="form-control" id="resume" name="resume" value="{{ $livre->resume }}">
 </div>
 <div class="mb-3">
    <label for="categorie" class="form-label">Catégorie</label>
    <select name="categorie" id="categorie">
        @foreach ($categories as $categorie)
        @if ($livre->categorie_id == $categorie->id)
        <option value="{{ $categorie->id }}" selected>{{ $categorie->libelle }}</option>
        @else
        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
        @endif
        @endforeach
    </select>
    </div>
 <div class="mb-3">
 <label for="prix" class="form-label">Prix du livre en €</label>
 <input type="text" class="form-control" id="prix" name="prix" value="{{ $livre->prix }} ">
 </div>
 <button type="submit" class="btn btn-primary">Valider</button>
 </form>
@stop

