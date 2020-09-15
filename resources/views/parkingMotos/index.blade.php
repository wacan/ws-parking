@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Parking Motos</span>
            </strong>
        </div>

        <!-- SEARCH FORM -->
        <form class="form-inline my-2 my-lg-0">             
          <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar...">
          <button class="btn btn-navbar" type="submit">
                <i class="fa fa-search"></i>
          </button>       
        </form>

        <h4>
            @if($search)
            <div class="alert alert-success" role="alert">
                El resultado de la busqueda de '{{$search}}' es:
            </div>
            @endif
        </h4>
            
     <div class="panel-body">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">NOMBRE PROPIETARIO</th>
            <th scope="col">APELLIDOS PROPIETARIO</th>
            <th scope="col">DOCUMENTO</th>
            <th scope="col">MODELO</th>
            <th scope="col">PLACAS</th>
            <th scope="col">PARKING ASIGANDO</th>
            <th scope="col">ACCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parkingMotos as $parkingMoto)
            <tr>
                <td>{{$parkingMoto->nombre_prop}}</td>
                <td>{{$parkingMoto->apellidos_prop}}</td>
                <td>{{$parkingMoto->documento}}</td>
                <td>{{$parkingMoto->modelo}}</td>
                <td>{{$parkingMoto->placas}}</td>             
                <td>{{$parkingMoto->parking_asigned}}</td>
                <td>
                    @include('parkingMotos.edit')
                    <form method="POST" action="{{route('parkingMotos.destroy', $parkingMoto->id)}}">
                    @csrf
                    @method('DELETE')
                    @can('Administrador')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este registro?')">
                    <i class="far fa-trash-alt"></i>
                    </button>
                    @endcan
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