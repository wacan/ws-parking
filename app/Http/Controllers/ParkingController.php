<?php

namespace App\Http\Controllers;

use App\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
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

            $parkings = Parking::where('name', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->paginate(5);
            return view('parking.index', ['parkings'=>$parkings, 'search'=>$query] );
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
        $parking = new Parking();

        //campos
        $parking->name = request('name');
        $parking->save();
        return redirect('/parking')->with('flash', 'Elemento guardado con exito');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parking = Parking::findOrFail($id);

        //campos
        $parking->name = $request->get('name');
        $parking->estado = $request->get('estado');

        $parking->update();
        return redirect('/parking')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parking = Parking::findOrFail($id);
        $parking->delete();
        return redirect('/parking')->with('flash', 'Elemento eliminado con exito');
    }
}
