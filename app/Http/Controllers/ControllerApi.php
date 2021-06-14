<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Redirect;
use App\Models\FavArtist;
use App\Models\User;

class ControllerApi extends Controller
{
    public function search(Request $request)
    {
        $user = auth()->user();
        $artist = $request->get('artist');
        $country = $request->get('country');
        $category = $request->get('category');
        $month = $request->get('month');
        $day = $request->get('day');
        $page = $request->get('page');
        $addArtist = $request->get('addArtist');
        $id_artista = $request->get('artist_id');

        if (auth()->user()) {
            $favArtist = User::find($user->id)->favorite($id_artista)->first();
            if ($favArtist) {
                $price = $favArtist->price;
            }
        }

        $globalArtist = FavArtist::where('id_artista', '=', $id_artista)->first();
        $price = rand(30, 120);

        if ($globalArtist) {
            $price = $globalArtist->price;
        }

        if ($addArtist && !$favArtist && $user) {
            FavArtist::create([
                'artist' => $artist,
                'id_usuario' => $user->id,
                'id_artista' => $id_artista,
                'coordinates1' => $request->get('coordinates1'),
                'coordinates2' => $request->get('coordinates2'),
                'labels' => $request->get('labels'),
                'location' => $request->get('localidad'),
                'description' => $request->get('description'),
                'timezone' => $request->get('timezone'),
                'updated' => $request->get('updated'),
                'date' => $request->get('date'),
                'price' => $price,
                'fav' => 1
            ]);
        }

        if ($addArtist && $user && $favArtist) {
            $artist = User::find($user->id)->favorite($id_artista);
            $artist->update(['fav' => 1]);
        }

        //Comprobamos si hay más de una página (más de 10 conciertos por página)
        if ($page > 1) {
            //En caso de que haya más de 10 conciertos, modificamos la URL para ir imprimiendo conciertos de 10 en 10
            $url = "https://api.predicthq.com/v1/events/?category=" . $category . "&country=" . $country
            . "&offset=" . ($page * 10) . "&start.gte=2021-" . $month . "-" . $day . "&start.lte=2021-" . $month . "-" . $day;
        } else {
            //En caso de que haya 10 conciertos o menos, no limitamos los conciertos y los enseñamos todos
            $url = "https://api.predicthq.com/v1/events/?category=" . $category . "&country=" . $country
            . "&start.gte=2021-" . $month . "-" . $day . "&start.lte=2021-" . $month . "-" . $day;
        }

        $response = Http::withToken('Mq6KIS9UfBUWtKRh22T3Vc1yr4EVXf8FKUeVf_Ay')->get($url)->body();
        $data = json_decode($response);
        $next = "";
        $price = 0;


        //Comprobamos en la API si hay mas conciertos
        if ($data->next) {
            //en caso de que los haya, los guardamos en la variable $next
            $next = $data->next;
        }
        
        $results = $data->results;
        // $collection = collect($results);
        
        $total = $data->count;
        return view('results', compact('results', 'next', 'page', 'total', 'country', 'category', 'price'));
    }
}
