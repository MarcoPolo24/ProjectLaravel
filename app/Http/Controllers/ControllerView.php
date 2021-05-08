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

    public function resultsArtists()
    {
        return view('resultsArtists', compact('results'));
    }

    public function favorites()
    {
        $user = auth()->user();
        $results = FavArtist::where('id_usuario', '=', $user->id)->get();
        return view('favorites', compact('results'));
    }

    public function deleteFav(Request $request)
    {
        $user = auth()->user();
        $results = FavArtist::where('id_usuario', '=', $user->id)->get();
        $artist = FavArtist::where('id_artista', '=', $request->id);
        $artist->delete();
        return view('favorites', compact('results'));
    }
}
