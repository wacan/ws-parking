<?php

namespace App\Http\Controllers;

use App\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
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

            $tarifas = Tarifa::where('tipo_vehiculo', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->paginate(5);
            return view('tarifas.index', ['tarifas'=>$tarifas, 'search'=>$query] );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifa = new Tarifa();

        //campos
        $tarifa->tipo_vehiculo = request('tipo_vehiculo');
        $tarifa->tarifa_fija = request('tarifa_fija');
        $tarifa->save();
        return redirect('/tarifas')->with('flash', 'Elemento guardado con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarifa = Tarifa::findOrFail($id);

        //campos
        $tarifa->tipo_vehiculo = $request->get('tipo_vehiculo');
        $tarifa->tarifa_fija = $request->get('tarifa_fija');

        $tarifa->update();
        return redirect('/tarifas')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarifa = Tarifa::findOrfail($id);
        $tarifa->delete();
        return redirect('/tarifas')->with('flash', 'Elemento eliminado con exito');
    }
}
