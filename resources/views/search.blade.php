@extends('layouts.app')

@section('content')
<div class="">
    <div class="col-lg-4 col-md-6 col-sm-12 pull-left">
        <div class="card">
            <div class="card-body bg-light">
                Artista: 
                <input list="artists" name="artists" id="artists">
            </div>

            <div class="card-body">
                Localidad: 
                <input list="localities" name="localities" id="localities">
            </div>

            <div class="card-body bg-light">
                Categoría: 
                <input list="categories" name="categories" id="categories">
            </div>
        </div>
    </div>

    <div>
        <h1>Buscar</h1>
    </div>
</div>


@endsection