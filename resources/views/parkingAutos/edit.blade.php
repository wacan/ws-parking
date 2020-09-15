<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditParking-{{$parkingAuto->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['ParkingAutosController@update', $parkingAuto->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditParking-{{$parkingAuto->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Asignar parqueadero</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('parkingAutos.update', $parkingAuto->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Modelo:</label>
            <input type="text" name="modelo" class="form-control" id="recipient-name" value="{{$parkingAuto->modelo}}" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Placas:</label>
            <input type="text" name="placas" class="form-control" id="recipient-name" value="{{$parkingAuto->placas}}" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asignar puesto:</label>
            <select type="text" name="parking_asigned" class="form-control" id="recipient-name">
                <option selected disable>Seleccione un puesto</option>
                <option value="AO-1">AO-1</option>
                <option value="AO-2">AO-2</option>
                <option value="AO-3">AO-3</option>
                <option value="AO-4">AO-4</option>
                <option value="AO-5">AO-5</option>
                <option value="AS-1">AS-1</option>
                <option value="AS-2">AS-2</option>
                <option value="AS-3">AS-3</option>
                <option value="AS-4">AS-4</option>
                <option value="AS-5">AS-5</option>
            </select>
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