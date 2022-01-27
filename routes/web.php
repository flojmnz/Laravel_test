<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Categorie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('accueil', function () {
    return view('accueil');
});
Route::get('liste', function () {
    $livres = Livre::get();
    $categories = Categorie::get();
    return view('liste_livres', ["livres" => $livres], ["categories" => $categories]);
});
Route::get('meslivres', function () {
    $user_id = Auth::user()->id;
    $livres = Livre::where('user_id','=',$user_id)->get();
    $categories = Categorie::get();
    return view('meslivres', ["livres" => $livres], ["categories" => $categories]);
});

Route::get('supprimer', function(Request $request){
    $categories = Categorie::get();
    $user_id = Auth::user()->id;
    $livre = Livre::find($request->input('id'));
    $livre->delete();
    // affichage de la nouvelle listeaprès suppression
    $livres = Livre::where('user_id','=',$user_id)->get();
    return view('meslivres', ["livres" => $livres], ["categories" => $categories]);
});

Route::get('modif', function(Request $request){
    $categories = Categorie::get();
    $livre = Livre::find($request->input('id'));
    return view('modifier_livre',["livre"=>$livre], ["categories" => $categories]);
});

Route::get('modification', function(Request $request){
    $categories = Categorie::get();
    $user_id = Auth::user()->id;
    $livre = Livre::find($request->input('id'));
    $livre->titre = $request->input('titre');
    $livre->resume = $request->input('resume');
    $livre->categorie_id = $request->input('categorie');
    $livre->prix = $request->input('prix');
    if($livre->save()){
        $message = "Livre modifié";   
    }
    else{
        $message = "Erreur lors de la modification";
    }
    $livres = Livre::where('user_id','=',$user_id)->get();
        return view('meslivres',["livres" => $livres], ["categories" => $categories]);
});

Route::get('ajouter', function (Request $request) {
    $categories = Categorie::get();
    return view('ajout_livre',["categories" => $categories]);
});

Route::get('ajout', function (Request $request) {
    $categories = Categorie::get();
    $livre = new Livre;
    $livre->titre = $request->input('titre');
    $livre->resume = $request->input('resume');
    $livre->categorie_id = $request->input('categorie');
    $livre->prix = $request->input('prix');
    $livre->user_id = Auth::user()->id;
    $livre->save();
    $livres = Livre::get();
    return view('liste_livres', ["livres" => $livres], ["categories" => $categories]);
});

Route::get('recherche', function (Request $request) {
    $livres = Livre::where('titre', 'like', '%' . $request->input('search') . '%')->get();
    return view('resultat_recherche', ["livres" => $livres]);
});

Auth::routes();
