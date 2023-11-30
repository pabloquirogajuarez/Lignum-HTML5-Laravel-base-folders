@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Actores</div>

                <div class="card-body">
                    <a href="{{ route('actores.create') }}" class="btn btn-primary">Crear nuevo actor</a>
                    <br/><br/>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actores as $actor)
                                <tr>
                                    <td>{{ $actor->nombre }}</td>
                                    <td>{{ $actor->fecha_nacimiento }}</td>
                                    <td>
                                        <a href="{{ route('actores.edit', $actor->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('actores.destroy', $actor->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection