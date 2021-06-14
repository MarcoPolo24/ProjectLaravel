@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth

            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <h3>Bienvenido a Music Finder</h3>
            </div>
        
            <div class="row">
                <div class="mr-5">
                    <div class="card">
                    <div class="card-header">
                        Conciertos
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Quieres buscar conciertos?</h5>
                        <p class="card-text">Quieres explorar los conciertos que hay alrededor de todo el mundo?</p>
                        <p>Haz click en el botón de abajo!</p>
                        <a href="/search" class="btn btn-primary">Ver conciertos</a>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        Artistas
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Quieres ver tus artistas favoritos?</h5>
                        <p class="card-text">Para poder ver tus artistas favoritos haz click es el botón de abajo!</p>
                        <br>
                        <a href="/favorites" class="btn btn-primary">Ver artistas</a>
                    </div>
                </div>
            </div>
            
                
            @endauth
            @guest
                <div class="alert alert-info" role="alert">
                    <h3>Bienvenido a Music Finder</h3>
                    <p>No has iniciado sesión</p>
                </div>
            @endguest
        </div>
    </div>
</div>
@endsection
