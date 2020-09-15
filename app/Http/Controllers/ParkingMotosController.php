<?php

namespace App\Http\Controllers;

use App\Moto;
use Illuminate\Http\Request;

class ParkingMotosController extends Controller
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
            
            $parkingMotos = Moto::where('placas', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->get();
            return view('parkingMotos.index', ['parkingMotos'=>$parkingMotos, 'search'=>$query]);
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
        $parkingMoto = Moto::findOrfail($id);

        //Campos
        $parkingMoto->parking_asigned = $request->get('parking_asigned');

        $parkingMoto->update();
        return redirect('/parkingMotos')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parkingMoto = Moto::findOrfail($id);

        $parkingMoto->delete();
        return redirect('/parkingMotos')->with('flash', 'Elemento eliminado con exito');
    }
}
