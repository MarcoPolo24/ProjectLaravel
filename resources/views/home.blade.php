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
