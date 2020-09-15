<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditSalidaCicla-{{$salidaCicla->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['salidaCiclasController@update', $salidaCicla->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditSalidaCicla-{{$salidaCicla->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Registrar Salidas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('salidaCiclas.update', $salidaCicla->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha salida:</label>
            <input type="date" name="fecha_salida" class="form-control" id="recipient-name" value="{{$salidaCicla->fecha_salida}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora salida:</label>
            <input type="time" name="hora_salida" class="form-control" id="recipient-name" value="{{$salidaCicla->hora_salida}}" >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Asignar</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}