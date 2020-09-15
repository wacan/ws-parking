<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditTarifa-{{$tarifa->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['TarifaController@update', $tarifa->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditTarifa-{{$tarifa->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Editar tarifas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('tarifas.update', $tarifa->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Clase vehículo:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$tarifa->tipo_vehiculo}}">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio tarifa:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$tarifa->tarifa_fija}}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}