@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        @foreach ($results as $result)
            <h3>{{ $result->title }}</h3>
        @endforeach
    </div>
</div>
@endsection
