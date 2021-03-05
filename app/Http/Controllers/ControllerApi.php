<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControllerApi extends Controller
{
    public function search(Request $request)
    {
        $artist = $request->get('artist');
        $country = $request->get('country');
        $category = $request->get('category');
        $url = "https://api.predicthq.com/v1/events/?category=" . $category . "&country=" . $country;
        $response = Http::withToken('T71DKVXOlCXYUWDdwN45Ki9sLb_xvLHBlmtoXzzl')->get($url)->body();
        $data = json_decode($response);
        $next = $data->next;
        $results = $data->results;
        $total = $data->count;
        return view('results', compact('results', 'next'));
    }
}
