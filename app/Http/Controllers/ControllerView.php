<?php

namespace App\Http\Controllers;

use App\Models\FavArtist;
use Illuminate\Http\Request;

class ControllerView extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function concerts()
    {
        return view('concerts');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function search()
    {
        return view('search');
    }

    public function results()
    {
        return view('results');
    }

    public function resultsFavArtists(Request $request)
    {
        $request = FavArtist::where('id_artista', '=', $request->id)->first();
        return view('resultsArtists', compact('request'));

    }

    public function resultsArtists(Request $request)
    {
        return view('resultsArtists', compact('request'));
    }

    public function favorites()
    {
        $user = auth()->user();
        //Guardo todos los artistas favoritos relacionados con el usuario de la sesión actual
        //y los envío a la view 'favorites' para imprimir su información
        $results = FavArtist::where('id_usuario', '=', $user->id)->get();
        return view('favorites', compact('results'));
    }

    public function deleteFav(Request $request)
    {
        $artist = FavArtist::where('id_artista', '=', $request->id);
        $artist->delete();
        return redirect()->route('favorites');
        // return view('favorites', compact('results'));
    }
}
