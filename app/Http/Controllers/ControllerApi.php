<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Redirect;
use App\Models\FavArtist;

class ControllerApi extends Controller
{
    public function search(Request $request)
    {
        $artist = $request->get('artist');
        $country = $request->get('country');
        $category = $request->get('category');
        $page = $request->get('page');
        $addArtist = $request->get('addArtist');
        $id_artista = $request->get('artist_id');
        
        if ($addArtist) {
            $user = auth()->user();
            FavArtist::create([
                'nombre_artista' => $artist,
                'id_usuario' => $user->id,
                'id_artista' => $id_artista
            ]);
        }

        //Comprobamos si hay más de una página (más de 10 conciertos por página)
        if ($page > 1) {
            //En caso de que haya más de 10 conciertos, modificamos la URL para ir imprimiendo conciertos de 10 en 10
            $url = "https://api.predicthq.com/v1/events/?offset=" . ($page * 10) . "&category=" . $category .
            "&country=" . $country;
        } else {
            //En caso de que haya 10 conciertos o menos, no limitamos los conciertos y los enseñamos todos
            $url = "https://api.predicthq.com/v1/events/?category=" . $category . "&country=" . $country;
        }

        $response = Http::withToken('tNdAI6nsMooLm3lJDmeEm5QKHOsqBFBJtmyYh18S')->get($url)->body();
        $data = json_decode($response);
        $next = "";

        //Comprobamos en la API si hay mas conciertos
        if ($data->next) {
            //en caso de que los haya, los guardamos en la variable $next
            $next = $data->next;
        }
        
        $results = $data->results;
        $collection = collect($results);

        $total = $data->count;
        return view('results', compact('results', 'next', 'page', 'total', 'country', 'category'));
    }

    public function searchFavArtists(Request $request)
    {
        $url = "https://api.predicthq.com/v1/events/?offset=10";
        $response = Http::withToken('T71DKVXOlCXYUWDdwN45Ki9sLb_xvLHBlmtoXzzl')->get($url)->body();
        $data = json_decode($response);
        $next = "";

        //Comprobamos en la API si hay mas conciertos
        if ($data->next) {
            //en caso de que los haya, los guardamos en la variable $next
            $next = $data->next;
        }
        
        $results = $data->results;
        $collection = collect($results);
        $total = $data->count;

        return view('resultsArtists', compact('results', 'total'));
    }
}
