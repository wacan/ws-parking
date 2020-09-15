<?php

namespace App\Http\Controllers;

use App\Automovil;
use Illuminate\Http\Request;

class SalidaAutosController extends Controller
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
            
            $salidaAutos = Automovil::where('placas', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('salidaAutos.index', ['salidaAutos'=>$salidaAutos, 'search'=>$query]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salidaAuto = Automovil::findOrfail($id);

        //Campos
        $salidaAuto->fecha_salida = $request->get('fecha_salida');
        $salidaAuto->hora_salida = $request->get('hora_salida');

        $salidaAuto->update();
        return redirect('/salidaAutos')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salidaAuto = Automovil::findOrfail($id);

        $salidaAuto->delete();
        return redirect('/salidaAutos')->with('flash', 'Elemento eliminado con exito');
    }
}
