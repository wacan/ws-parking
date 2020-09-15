<?php
namespace App\Http\Controllers;

use App\Bicicleta;
use Illuminate\Http\Request;

class salidaCiclasController extends Controller
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
            
            $salidaCiclas = Bicicleta::where('num_marco', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('salidaCiclas.index', ['salidaCiclas'=>$salidaCiclas, 'search'=>$query]);
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
        $salidaCicla = Bicicleta::findOrfail($id);

        //Campos
        $salidaCicla->fecha_salida = $request->get('fecha_salida');
        $salidaCicla->hora_salida = $request->get('hora_salida');

        $salidaCicla->update();
        return redirect('/salidaCiclas')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salidaCicla = Bicicleta::findOrfail($id);

        $salidaCicla->delete();
        return redirect('/salidaCiclas')->with('flash', 'Elemento eliminado con exito');
    }
}
