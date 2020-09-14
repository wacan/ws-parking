@extends('layouts.app')

@section('content')

@if(session('flash'))
  <div class="alert alert-success">{{session('flash')}}</div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Grupos</span>
        @include('roles.modal')
     </strong>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th class="text-center">Nombre del grupo</th>
            <th class="text-center" style="width: 20%;">Nivel del grupo</th>
            <th class="text-center" style="width: 15%;">Estado</th>
            <th class="text-center" style="width: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
          <tr>
           <td class="text-center">{{$role->id}}</td>
           <td class="text-center">{{$role->name}}</td>
           <td class="text-center">{{$role->label}}</td>
           <td class="text-center">
           @if($role['role_estado']===1)
            <span class="label label-success"> {{"Activo"}}</span>
          @else
            <span class="label label-danger"> {{"Inactivo"}}</span>
          @endif
           </td>
           
           <td class="text-center">
           @include('roles.modal-edit')
           <form method="POST" action="{{route('group.destroy', $role->id)}}">                
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este rol?')">
                  <i class="far fa-trash-alt"></i>
                </button>
            </form>
           </td>
          </tr>
        @endforeach
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  @endsection
