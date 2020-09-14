<?php

namespace App\Http\Controllers;

use App\Automovil;
use Illuminate\Http\Request;

class AutomovilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));

            $autos = Automovil::where('placas', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('automoviles.index', ['autos'=>$autos, 'search'=>$query] );
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autos = Automovil::all();
        return view('automoviles.create', ['autos'=>$autos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auto = new Automovil();

        //campos de la tabla vehículo
        $auto->nombre_prop = request('name');
        $auto->apellidos_prop = request('lastname');
        $auto->documento = request('identificacion');
        $auto->modelo = request('modelo');
        $auto->placas = request('placas');
        $auto->color = request('color');
        $auto->tipo_auto = request('tipo');
        $auto->fecha_ingreso = request('fechaIngreso');
        $auto->hora_ingreso = request('horaIngreso');

        $auto->save();
        return redirect('/automoviles')->with('flash', 'Elemento guardado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Automovil  $automovil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auto = Automovil::findOrfail($id);
        return view('automoviles.edit', ['auto'=>$auto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Automovil  $automovil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $auto = Automovil::findOrfail($id);

        //campos
        $auto->nombre_prop = $request->get('name');
        $auto->apellidos_prop = $request->get('lastname');
        $auto->documento = $request->get('identificacion');
        $auto->modelo = $request->get('modelo');
        $auto->placas = $request->get('placas');
        $auto->color = $request->get('color');
        $auto->tipo_auto = $request->get('tipo');
        $auto->fecha_ingreso = $request->get('fechaIngreso');
        $auto->hora_ingreso = $request->get('horaIngreso');

        $auto->update();
        return redirect('/automoviles')->with('flash', 'Elemento Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automovil  $automovil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auto = Automovil::findOrfail($id);
        $auto->delete();
        return redirect('/automoviles')->with('flash', 'Elemento eliminado con exito');
    }
}
