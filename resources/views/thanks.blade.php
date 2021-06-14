<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container justify-content-center">
        <div class="text-center">
            <h1>Gracias por comprar {{ $request->name }}</h1>
        </div>
    
        <div class="text-center">
            <div class="alert alert-info" role="alert">
                Has comprado la entrada de {{ $request->artist}} a un precio de {{ number_format( $request->price, 2) }} EU
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="card" style="width: 48%">
                <div class="card-header">
                    Conciertos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Seguir buscando</h5>
                    <p class="card-text">Haz click en el botón de abajo para seguir buscando</p>
                    <a href="/search" class="btn btn-primary">Ver conciertos</a>
                </div>
            </div>
    
            <div class="card" style="width: 48%">
                <div class="card-header">
                    Home
                </div>
                <div class="card-body">
                    <h5 class="card-title">Menú Principal</h5>
                    <p class="card-text">Click en el boton de abajo para volver al menú principal</p>
                    <br>
                    <a href="/" class="btn btn-primary">Menú principal</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection