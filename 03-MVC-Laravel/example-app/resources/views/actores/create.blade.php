@extends('layouts.app')

@section('content')
    <h1>Agregar Actor</h1>
    <form action="{{ route('actores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
@endsection