@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Salida Ciclas</span>
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
            <th scope="col">MODELO</th>
            <th scope="col">No DE MARCO</th>
            <th scope="col">FECHA ENTRADA</th>
            <th scope="col">HORA ENTRADA</th>
            <th scope="col">FECHA SALIDA</th>
            <th scope="col">HORA SALIDA</th>
            <th scope="col">ACCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salidaCiclas as $salidaCicla)
            <tr>
                <td>{{$salidaCicla->marca}}</td>
                <td>{{$salidaCicla->num_marco}}</td>             
                <td>{{$salidaCicla->fecha_ingreso}}</td>
                <td>{{$salidaCicla->hora_ingreso}}</td>
                <td>{{$salidaCicla->fecha_salida}}</td>
                <td>{{$salidaCicla->hora_salida}}</td>
                <td>
                    @include('salidaCiclas.edit')
                    <form method="POST" action="{{route('salidaCiclas.destroy', $salidaCicla->id)}}">
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