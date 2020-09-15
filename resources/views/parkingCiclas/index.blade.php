@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Parking Ciclas</span>
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
            <th scope="col">MARCA</th>
            <th scope="col">No DE MARCO</th>
            <th scope="col">PARKING ASIGANDO</th>
            <th scope="col">ACCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($parkingCiclas as $parkingCicla)
            <tr>
                <td>{{$parkingCicla->nombre_prop}}</td>
                <td>{{$parkingCicla->apellidos_prop}}</td>
                <td>{{$parkingCicla->documento}}</td>
                <td>{{$parkingCicla->marca}}</td>
                <td>{{$parkingCicla->num_marco}}</td>             
                <td>{{$parkingCicla->parking_asigned}}</td>
                <td>
                    @include('parkingCiclas.edit')
                    <form method="POST" action="{{route('parkingCiclas.destroy', $parkingCicla->id)}}">
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