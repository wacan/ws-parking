<?php

namespace App\Http\Controllers;

use App\Moto;
use Illuminate\Http\Request;

class MotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('search'));

            $motos = Moto::where('placas', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('motos.index', ['motos'=>$motos, 'search'=>$query]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motos = Moto::all();
        return view('motos.create', ['motos'=>$motos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moto = new Moto();

        //Campos de la tabla
        $moto->nombre_prop = request('name');
        $moto->apellidos_prop = request('lastname');
        $moto->documento = request('identificacion');
        $moto->modelo = request('modelo');
        $moto->placas = request('placas');
        $moto->color = request('color');
        $moto->tipo_moto = request('tipo');
        $moto->fecha_ingreso = request('fechaIngreso');
        $moto->hora_ingreso = request('horaIngreso');

        $moto->save();
        return redirect('/motos')->with('flash', 'Elemento guardado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\motos  $motos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moto = Moto::findOrfail($id);

        return view('motos.edit', ['moto'=>$moto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Moto  $motos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $moto = Moto::findOrfail($id);
        
        //campos
        $moto->nombre_prop = $request->get('name');
        $moto->apellidos_prop = $request->get('lastname');
        $moto->documento = $request->get('identificacion');
        $moto->modelo = $request->get('modelo');
        $moto->placas = $request->get('placas');
        $moto->color = $request->get('color');
        $moto->tipo_moto = $request->get('tipo');
        $moto->fecha_ingreso = $request->get('fechaIngreso');
        $moto->hora_ingreso = $request->get('horaIngreso');

        $moto->update();
        return redirect('/motos')->with('flash', 'Elemento Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Moto  $motos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moto = Moto::findOrfail($id);

        $moto->delete();
        return redirect('/motos')->with('flash', 'Elemento eliminado con exito');
    }
}
