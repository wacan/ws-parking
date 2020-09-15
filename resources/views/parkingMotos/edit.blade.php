<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditParkingMoto-{{$parkingMoto->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['ParkingMotosController@update', $parkingMoto->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditParkingMoto-{{$parkingMoto->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Asignar parqueadero</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('parkingMotos.update', $parkingMoto->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Modelo:</label>
            <input type="text" name="modelo" class="form-control" id="recipient-name" value="{{$parkingMoto->modelo}}" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Placas:</label>
            <input type="text" name="placas" class="form-control" id="recipient-name" value="{{$parkingMoto->placas}}" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asignar puesto:</label>
            <select type="text" name="parking_asigned" class="form-control" id="recipient-name">
                <option selected disable>Seleccione un puesto</option>
                <option value="MO-1">MO-1</option>
                <option value="MO-2">MO-2</option>
                <option value="MO-3">MO-3</option>
                <option value="MO-4">MO-4</option>
                <option value="MO-5">MO-5</option>
                <option value="MO-6">MO-6</option>
                <option value="MO-7">MO-7</option>
                <option value="MO-8">MO-8</option>
                <option value="MO-9">MO-9</option>
                <option value="MO-10">MO-10</option>
                <option value="MS-1">MS-1</option>
                <option value="MS-2">MS-2</option>
                <option value="MS-3">MS-3</option>
                <option value="MS-4">MS-4</option>
                <option value="MS-5">MS-5</option>
                <option value="MS-6">MS-6</option>
                <option value="MS-7">MS-7</option>
                <option value="MS-8">MS-8</option>
                <option value="MS-9">MS-9</option>
                <option value="MS-10">MS-10</option>
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