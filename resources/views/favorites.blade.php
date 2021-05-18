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
                @foreach ($results as $result)
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $result->artist }}</td>
                    <td>
                        <form action="/resultsFavArtists" method="POST">
                            @csrf
                            <input hidden type="text" name="id" value="{{ $result->id_artista }}">
                            <button class="btn btn-primary">Información</button>
                        </form>
                    </td>
                    <td>
                        <form action="/deleteFav" method="POST">
                            @csrf
                            <button class="btn btn-danger">Eliminar</button>
                            <input hidden type="text" name="id" value="{{ $result->id_artista }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
