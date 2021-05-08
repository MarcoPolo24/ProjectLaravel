@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="header">Tus artistas favoritos</h1>
    @if ($results)
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Artistas</th>
                <th scope="col">Información del artista:</th>
                <th scope="col">Eliminar de favoritos</th>
            </tr>
            </thead>
            <tbody>
                <form action="/resultsArtists" method="POST">
                    @csrf
                    @foreach ($results as $result)
                    <tr>
                        <th scope="row">1</th>
                        <th>{{ $result->nombre_artista }}</th>
                        <th><button class="btn btn-primary">Información</button></th>
                </form>
                <form action="/deleteFav" method="POST">
                    @csrf
                        <input hidden type="text" name="id" value="{{ $result->id_artista }}">
                        <th><button class="btn btn-danger">Eliminar</button></th>
                    </tr>
                </form>
                    @endforeach
                
            </tbody>
        </table>
    @endif
</div>
@endsection
