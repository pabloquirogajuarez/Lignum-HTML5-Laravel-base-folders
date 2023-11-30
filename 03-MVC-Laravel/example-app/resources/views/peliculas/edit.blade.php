@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/peliculas/{{ $pelicula->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" value="{{ $pelicula->anio }}">
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $pelicula->titulo }}">
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input type="number" class="form-control" id="duracion" name="duracion" value="{{ $pelicula->duracion }}">
        </div>
        <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea class="form-control" id="sinopsis" name="sinopsis">{{ $pelicula->sinopsis }}</textarea>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" class="form-control" id="imagen" name="imagen" value="{{ $pelicula->imagen }}">
        </div>
        <div class="form-group">
            <label for="actor_principal_id">Actor Principal ID</label>
            <input type="number" class="form-control" id="actor_principal_id" name="actor_principal_id" value="{{ $pelicula->actor_principal_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection