<?php

namespace App\Http\Controllers;

use App\Automovil;
use App\Parking;
use Illuminate\Http\Request;

class ParkingAutosController extends Controller
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
            
            $parkingAutos = Automovil::where('placas', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('parkingAutos.index', ['parkingAutos'=>$parkingAutos, 'search'=>$query]);
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
        $parkingAuto = Automovil::findOrfail($id);

        //Campos
        $parkingAuto->parking_asigned = $request->get('parking_asigned');

        $parkingAuto->update();
        return redirect('/parkingAutos')->with('flash', 'Elemento actualizado con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parkingAuto = Automovil::findOrfail($id);

        $parkingAuto->delete();
        return redirect('/parkingAutos')->with('flash', 'Elemento eliminado con exito');
    }
}
