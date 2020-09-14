<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserEditFormRequest;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

use App\User;
use App\Role;

class UserController extends Controller
{
   
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('usuarios.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User();

        //campos del name de los imputs que se capturan dentro de la variable usuario
        $usuario->name = request('name');
        $usuario->lastname = request('lastname');
        $usuario->username = request('userName');
        $usuario->user_estado = request('estado');
        $usuario->password = bcrypt(request('password'));
    
        $usuario->save();
        $usuario->asignarRol($request->get('rol'));
        return redirect('/usuarios')->with('flash', 'Elemento guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        $roles = Role::all();
        return view('usuarios.edit', ['user' => $user, 'roles' => $roles]);
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

        $usuario =  User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->lastname = $request->get('lastname');
        $usuario->username = $request->get('userName');
        $usuario->user_estado = $request->get('estado');

        $role = $usuario->roles;
        if(count($role) > 0)
        {
            $role_id = $role[0]->id;
        }
        User::find($id)->roles()->updateExistingPivot($role_id, ['role_id' => $request->get('rol')]);

        $usuario->update(); //linea que actualiza los datos capturados

        return redirect('/usuarios')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/usuarios')->with('flash', 'Elemento eliminado con exito');
    }
}
