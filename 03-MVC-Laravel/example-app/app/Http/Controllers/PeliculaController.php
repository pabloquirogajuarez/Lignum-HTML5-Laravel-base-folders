<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        return view('peliculas.create');
    }

    public function store(Request $request)
    {
        $pelicula = new Pelicula;
        $pelicula->anio = $request->anio;
        $pelicula->titulo = $request->titulo;
        $pelicula->duracion = $request->duracion;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->imagen = $request->imagen;
        $pelicula->actor_principal_id = $request->actor_principal_id;
        $pelicula->save();
        return redirect('/peliculas');
    }

    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, Pelicula $pelicula)
    {
        $pelicula->anio = $request->anio;
        $pelicula->titulo = $request->titulo;
        $pelicula->duracion = $request->duracion;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->imagen = $request->imagen;
        $pelicula->actor_principal_id = $request->actor_principal_id;
        $pelicula->save();
        return redirect('/peliculas');
    }

    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect('/peliculas');
    }
}