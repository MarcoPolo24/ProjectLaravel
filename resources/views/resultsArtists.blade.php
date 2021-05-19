@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h1 > {{ $request->artist }} </h1>
        </div>
        <div class="card-body">
            <div class="card-columns d-md-flex align-items-md-stretch justify-content-md-between">
    
                <div class="card {{ $request->description == null ? 'border-danger' : 'border-secondary' }} mb-3 mt-3 ml-3" style="max-width: 30rem;">
                    <div class="card-header h3 {{ $request->description == null ? 'text-danger' : '' }}">Descripción</div>
                    <div class="card-body text-secondary">
                        <h4 class="card-text {{ $request->description == null ? 'text-danger' : '' }}">
                            {{ $request->description == null ? 'No se ha encontrado la descripción' : $request->description }}
                        </h4>
                    </div>
                </div>
    
                <div class="card {{ $request->location == null ? 'border-danger' : 'border-secondary' }} mb-3 mt-3 ml-3" style="max-width: 30rem;">
                    <div class="card-header h3 {{ $request->location == null ? 'text-danger' : '' }}">Actuación</div>
                    <div class="card-body text-secondary">
                        <h4 class="card-text {{ $request->location == null ? 'text-danger' : '' }}">
                            {{ $request->location == null ? 'No se ha encontrado la localidad' : $request->location }}
                        </h4>
                    </div>
                </div>
    
                <div class="card {{ $request->timezone == null ? 'border-danger' : 'border-secondary' }} mb-3 mt-3 ml-3" style="max-width: 30rem;">
                    <div class="card-header h3 {{ $request->timezone == null ? 'text-danger' : '' }}">Zona horaria</div>
                    <div class="card-body text-secondary">
                        <h4 class="card-text {{ $request->timezone == null ? 'text-danger' : '' }}">
                            {{ $request->timezone == null ? 'No se ha encontrado la zona horaria' : $request->timezone }}
                        </h4>
                    </div>
                </div>

                <div class="card {{ $request->timezone == null ? 'border-danger' : 'border-secondary' }} mb-3 mt-3 ml-3" style="max-width: 30rem;">
                    <div class="card-header h3 {{ $request->date == null ? 'text-danger' : '' }}">Fecha de concierto</div>
                    <div class="card-body text-secondary">
                        <h4 class="card-text {{ $request->date == null ? 'text-danger' : '' }}">
                            {{ $request->timezone == null ? 'No se ha encontrado la fecha' : date('l, jS \of F Y h:i:s A', strtotime($request->date)) }}
                        </h4>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-center">
                <div id="map" style="position: relative; width:600px; height: 400px;"></div>
            </div>
        </div>
        <div class="card-footer text-muted text-center">
            <h5>Última actualización del concierto:</h5>
            @if($request->updated == null)
            <h3> No se ha encontrado la última actualización</h3>
            @else
            <h3>{{ date('l, jS \of F Y h:i:s A', strtotime($request->updated)) }}</h3>
            @endif
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

@if ($request->location)
    var script = document.createElement('script');
    
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA3qCHf6XL0Zbih9kF_OmEkpZCvQPqNY0Q&callback=initMap';
    script.async = true;

    window.initMap = function() {
        var coor1 = {!! json_encode($request->coordinates1) !!};
        var coor2 = {!! json_encode($request->coordinates2) !!};
        
        const uluru = { lat: parseFloat(coor2) , lng: parseFloat(coor1) };
        
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: uluru,
        });
        
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });    
    };
@endif

document.head.appendChild(script);

</script>

@endsection
