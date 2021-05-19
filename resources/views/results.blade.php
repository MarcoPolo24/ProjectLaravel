@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        @foreach ($results as $result)
            <form action="/search" method="POST">
                @csrf
                <input hidden type="text" name="artist" value="{{ $result->title }}">
                <input hidden type="text" name="page" value="{{ $page }}">
                <input hidden type="text" name="country" value="{{ $country }}">
                <input hidden type="text" name="category" value="{{ $category }}">
                <input hidden type="text" name="addArtist" value="{{ true }}">
                <input hidden type="text" name="artist_id" value="{{ $result->id }}">
                <input hidden type="text" name="coordinates1" value="{{ $result->location[0] }}">
                <input hidden type="text" name="coordinates2" value="{{ $result->location[1] }}">
                <input hidden type="text" name="description" value="{{ $result->description }}">
                <input hidden type="text" name="timezone" value="{{ $result->timezone }}">
                <input hidden type="text" name="localidad" value="{{ $result->entities ? $result->entities[0]->name : null }}">
                <input hidden type="text" name="updated" value="{{ $result->updated }}">
                <input hidden type="text" name="date" value="{{ $result->start }}">
                
                @if ( $result->entities)
                    <div class="card mb-1">   
                @else
                    <div class="card mb-1 border border-danger">
                @endif
                <div class="card-body">
                <button class="btn btn-primary mt-3 mb-2 ml-2 float-right">Seguir</button>
            </form>
            <form action="/resultsArtists" method="POST">
                @csrf
                <button class="btn btn-primary mt-3 mb-2 ml-3 float-right">Información</button>
                <input hidden type="text" name="artist" value="{{ $result->title }}">
                <input hidden type="text" name="country" value="{{ $country }}">
                <input hidden type="text" name="category" value="{{ $category }}">
                <input hidden type="text" name="coordinates1" value="{{ $result->location[0] }}">
                <input hidden type="text" name="coordinates2" value="{{ $result->location[1] }}">
                <input hidden type="text" name="description" value="{{ $result->description }}">
                <input hidden type="text" name="timezone" value="{{ $result->timezone }}">
                <input hidden type="text" name="updated" value="{{ $result->updated }}">
                <input hidden type="text" name="date" value="{{ $result->start }}">
                <h3>{{ $result->title }}</h3>
                @if ($result->entities)
                    <input hidden type="text" name="location" value="{{ $result->entities[0]->name }}">
                    <p>{{ $result->entities[0]->name }}</p>
                @else
                    <p class="text-danger">No se ha encontrado la localización del evento</p>
                @endif
               </form>
            </div>
        </div>
        @endforeach
        @if ($next)
            <form action="/search" method="POST">
                @csrf
                {{-- Desde la vista incrementamos el valor de la página y se la enviamos al controlador para poder imprimir
                    la siguiente pagina --}}
                <input hidden type="text" name="page" value="{{ $page + 1 }}">
                <input hidden type="text" name="country" value="{{ $country }}">
                <input hidden type="text" name="category" value="{{ $category }}">
                <input hidden type="text" name="addArtist" value="{{ false }}">
                <div class="text-center">
                    <p>Página {{ $page }} / {{ $total/10}}</p>
                    <button class="btn btn-primary mt-3 mb-2">Ver más ({{ $total }} eventos)</button>
                </div>
            </form>
        @else
            <div class="text-center">
                @if ($total > 10)
                    <p>Página {{ $page }} / {{ (int)$total/10}}</p>
                @else
                    <p>Página {{ $page }} / 1</p>
                @endif
                <p class="mt-3 alert alert-info ">No hay más resultados</p>
            </div>  
        @endif
    </div>
</div>
@endsection
