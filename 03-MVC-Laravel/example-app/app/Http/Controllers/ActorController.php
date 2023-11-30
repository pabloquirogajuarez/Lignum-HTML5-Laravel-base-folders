<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    /**
     * muestra lista de actores
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actores = Actor::all();
        return view('actores.index', compact('actores'));
    }

    /**
     * form para crear nuevo actor
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actores.create');
    }

    /**
     * almacena un actor recien creado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actor = new Actor([
            'nombre' => $request->get('nombre'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
        ]);
        $actor->save();
        return redirect('/actores')->with('success', 'Actor guardado!');
    }

    /**
     * muestra el actor especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor = Actor::find($id);
        return view('actores.show', compact('actor'));
    }

    /**
     * muestra el form para editar el actor especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actor = Actor::find($id);
        return view('actores.edit', compact('actor'));
    }

    /**
     * actualiza el actor especifico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actor = Actor::find($id);
        $actor->nombre = $request->get('nombre');
        $actor->fecha_nacimiento = $request->get('fecha_nacimiento');
        $actor->save();
        return redirect('/actores')->with('success', 'Actor actualizado!');
    }

    /**
     * borrar actor especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor = Actor::find($id);
        $actor->delete();
        return redirect('/actores')->with('success', 'Actor eliminado!');
    }
}