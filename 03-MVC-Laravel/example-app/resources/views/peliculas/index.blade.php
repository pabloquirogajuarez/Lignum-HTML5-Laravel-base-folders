@extends('layouts.app')

@section('content')
    <h1>Películas</h1>
    <a href="{{ route('peliculas.create') }}" class="btn btn-primary">Crear Película</a>
    <div class="row">
    @foreach ($peliculas as $pelicula)
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="{{ $pelicula->imagen }}" alt="{{ $pelicula->titulo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $pelicula->titulo }}</h5>
                    <p class="card-text">Año: {{ $pelicula->anio }}</p>
                    <p class="card-text">Duración: {{ $pelicula->duracion }} minutos</p>
                    <p class="card-text">Sinopsis: {{ $pelicula->sinopsis }}</p>
                    <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-primary">Modificar Película</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection