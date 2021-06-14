<?php

namespace App\Http\Controllers;

use App\Models\FavArtist;
use App\Models\User;
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

    public function search()
    {
        return view('search');
    }

    public function thanks(Request $request)
    {
        if (strlen($request->cp) != 5 || strlen($request->sCode) != 3 || strlen($request->tNum) != 16) {
            $error = 1;
            return view('comprar', compact('error', 'request'));
        }
        return view('thanks', compact('request'));
    }

    public function resultsFavArtists(Request $request)
    {
        $user = auth()->user();
        $request = FavArtist::where('id_artista', '=', $request->id)->where('id_usuario', '=', $user->id)->first();
        $price = $request->price;
        return view('resultsArtists', compact('request', 'price'));
    }

    public function resultsArtists(Request $request)
    {
        $user = auth()->user();
        $favArtist = FavArtist::where('id_artista', '=', $request->get('artist_id'))->first();
        $price = rand(30, 120);

        if (!$favArtist) {
            if ($user) {
                $idUsuario = $user->id;
            } else {
                $idUsuario = null;
            }
            
            FavArtist::create([
                'artist' => $request->get('artist'),
                'id_usuario' => $idUsuario,
                'id_artista' => $request->get('artist_id'),
                'coordinates1' => $request->get('coordinates1'),
                'coordinates2' => $request->get('coordinates2'),
                'labels' => $request->get('labels'),
                'location' => $request->get('localidad'),
                'description' => $request->get('description'),
                'timezone' => $request->get('timezone'),
                'updated' => $request->get('updated'),
                'date' => $request->get('date'),
                'price' => $price
            ]);
        } else {
            $price = $favArtist->price;
        }
    
        return view('resultsArtists', compact('request', 'price'));
    }

    public function formCompra(Request $request)
    {
        $error = 0;
        return view('comprar', compact('error', 'request'));
    }

    public function favorites()
    {
        $user = auth()->user();
        //Guardo todos los artistas favoritos relacionados con el usuario de la sesión actual
        //y los envío a la view 'favorites' para imprimir su información
        $results = User::find($user->id)->first()->favorites;
        //$results = FavArtist::where('id_usuario', '=', $user->id)->where('fav', '=', 1)->get();
        return view('favorites', compact('results'));
    }

    public function deleteFav(Request $request)
    {
        $user = auth()->user();
        $artist = User::find($user->id)->first()->favorite($request->id);
        $artist->update(['fav' => 0]);
        //$artist->delete();
        
        return redirect()->route('favorites');
        // return view('favorites', compact('results'));
    }
}
