<?php

namespace App\Http\Controllers;

use App\Bicicleta;
use Illuminate\Http\Request;

class BicicletasController extends Controller
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

            $ciclas = Bicicleta::where('num_marco', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();

            return view('bicicletas.index', ['ciclas'=>$ciclas, 'search'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciclas = Bicicleta::all();
        return view('bicicletas.create', ['ciclas'=>$ciclas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cicla = new Bicicleta();

        //campos de la BD
        $cicla->nombre_prop = request('name');
        $cicla->apellidos_prop = request('lastname');
        $cicla->documento = request('identificacion');
        $cicla->marca = request('marca');
        $cicla->num_marco = request('num_marco');
        $cicla->color = request('color');
        $cicla->tipo_cicla = request('tipo');
        $cicla->fecha_ingreso = request('fechaIngreso');
        $cicla->hora_ingreso = request('horaIngreso');

        $cicla->save();
        return redirect('/bicicletas')->with('flash', 'Elemento guardado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bicicletas  $bicicletas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cicla = Bicicleta::findOrfail($id);

        return view('bicicletas.edit', ['cicla'=>$cicla]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bicicletas  $bicicletas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cicla = Bicicleta::findOrfail($id);

        //campos
        $cicla->nombre_prop = $request->get('name');
        $cicla->apellidos_prop = $request->get('lastname');
        $cicla->documento = $request->get('identificacion');
        $cicla->marca = $request->get('marca');
        $cicla->num_marco = $request->get('num_marco');
        $cicla->color = $request->get('color');
        $cicla->tipo_cicla = $request->get('tipo');
        $cicla->fecha_ingreso = $request->get('fechaIngreso');
        $cicla->hora_ingreso = $request->get('horaIngreso');

        $cicla->update();
        return redirect('/bicicletas')->with('flash', 'Elemento Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bicicletas  $bicicletas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cicla = Bicicleta::findOrfail($id);

        $cicla->delete();
        return redirect('/bicicletas')->with('flash', 'Elemento eliminado con exito');
    }
}
