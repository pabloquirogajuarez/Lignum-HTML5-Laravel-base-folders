@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/peliculas" method="post">
        @csrf
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio">
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input type="number" class="form-control" id="duracion" name="duracion">
        </div>
        <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea class="form-control" id="sinopsis" name="sinopsis"></textarea>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="text" class="form-control" id="imagen" name="imagen">
        </div>
        <div class="form-group">
            <label for="actor_principal_id">Actor Principal ID</label>
            <input type="number" class="form-control" id="actor_principal_id" name="actor_principal_id">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection