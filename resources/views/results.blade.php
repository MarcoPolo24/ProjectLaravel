@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        @foreach ($results as $result)
        @if ( $result->entities)
        <div class="card mb-1">   
        @else
        <div class="card mb-1 border border-danger">
        @endif
            <div class="card-body ">

                <h3>{{ $result->title }}</h3>
                @if ($result->entities)
                    <p>{{ $result->entities[0]->name }}</p>
                @else
                    <p class="text-danger">No se ha encontrado la localización del evento</p>
                @endif
            </div>
        </div>
        @endforeach
        @if ($next)
            <a href="/" type="button" class="btn btn-primary mt-3">Ver los 10 siguientes</a>
            @else
            <div class="text-center">
                <p class="mt-3 alert alert-info ">No hay más resultados</p>
            </div>
        @endif

        
    </div>
</div>
@endsection
