@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Tarifas</span>
        @include('tarifas.modal')
     </strong>
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
        
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th class="text-center">Clase vehiculo</th>
            <th class="text-center" style="width: 15%;">Precios Tarifa por minuto</th>
            <th class="text-center" style="width: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tarifas as $tarifa)
          <tr>
           <td class="text-center">{{$tarifa->id}}</td>
           <td class="text-center">{{$tarifa->tipo_vehiculo}}</td>
           <td class="text-center"><i class="fa fa-dollar-sign"></i>{{$tarifa->tarifa_fija}}</td>
           <td class="text-center">
           @include('tarifas.modal-edit')
           <form method="POST" action="{{route('tarifas.destroy', $tarifa->id)}}">                
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este registro?')">
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
      {{$tarifas->links()}}
    </div>
  </div>
     </div>
    </div>
  </div>
</div>
  @endsection
