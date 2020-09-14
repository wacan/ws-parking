@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Usuarios</span>
            </strong>
          <a href="usuarios/create" class="btn btn-info pull-right">Agregar usuario</a>
        </div>
     <div class="panel-body">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">APELLIDOS</th>
        <th scope="col">ROL DE USUARIO</th>
        <th scope="col">ESTADO</th>
        <th scope="col">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
          <tr>
              <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->lastname}}</td>
              <td>
                @foreach($user->roles as $role)
                    {{$role->name}}
                @endforeach
              </td>
              <td>
              @if($user['user_estado']===1)
                <span class="label label-success"> {{"Activo"}}</span>
             @else
                <span class="label label-danger"> {{"Inactivo"}}</span>
              @endif
              </td>
              <td>
                <form method="POST" action="{{route('usuarios.destroy', $user->id)}}">
                <a href="{{route('usuarios.edit', $user->id)}}">
                  <button type="button" class="btn btn-primary btn-sm">
                    <i class="far fa-edit"></i>  
                  </button>
                </a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">
                  <i class="far fa-trash-alt"></i>
                </button>
                </form>
              </td>
          </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="mx-auto">
      
      </div>
    </div>
  </div>
</div>

@endsection