<?php

namespace App\Http\Controllers;

use App\Bicicleta;
use Illuminate\Http\Request;

class parkingCiclasController extends Controller
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
            
            $parkingCiclas = Bicicleta::where('num_marco', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('parkingCiclas.index', ['parkingCiclas'=>$parkingCiclas, 'search'=>$query]);
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
        $parkingCicla = Bicicleta::findOrfail($id);

        //Campos
        $parkingCicla->parking_asigned = $request->get('parking_asigned');

        $parkingCicla->update();
        return redirect('/parkingCiclas')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parkingCicla = Bicicleta::findOrfail($id);

        $parkingCicla->delete();
        return redirect('/parkingCiclas')->with('flash', 'Elemento eliminado con exito');
    }
}
