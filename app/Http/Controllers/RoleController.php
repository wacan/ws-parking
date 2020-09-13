<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.group', ['roles'=>$roles]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = request('name');
        $role->label = request('nivel');
        $role->role_estado = request('estado');
        
        $role->save();

        return redirect('group')->with('flash', 'Elemento guardado con exito');
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->name = $request->get('name');
        $role->label = $request->get('nivel');
        $role->role_estado = $request->get('estado');

        $role->update();

        return redirect('/group')->with('flash', 'Elemento actualizado con exito');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();
    
        return redirect('/group')->with('flash', 'Elemento eliminado con exito');
    }

}
