<?php

namespace App\Http\Controllers;

use App\Moto;
use Illuminate\Http\Request;

class salidaMotosController extends Controller
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
            
            $salidaMotos = Moto::where('placas', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('salidaMotos.index', ['salidaMotos'=>$salidaMotos, 'search'=>$query]);
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
        $salidaMoto = Moto::findOrfail($id);

        //Campos
        $salidaMoto->fecha_salida = $request->get('fecha_salida');
        $salidaMoto->hora_salida = $request->get('hora_salida');

        $salidaMoto->update();
        return redirect('/salidaMotos')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salidaMoto = Moto::findOrfail($id);

        $salidaMoto->delete();
        return redirect('/salidaAutos')->with('flash', 'Elemento eliminado con exito');
    }
}
