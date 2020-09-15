<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditParkingCiclas-{{$parkingCicla->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['parkingCiclasController@update', $parkingCicla->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditParkingCiclas-{{$parkingCicla->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Asignar parqueadero</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('parkingCiclas.update', $parkingCicla->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Modelo:</label>
            <input type="text" name="modelo" class="form-control" id="recipient-name" value="{{$parkingCicla->marca}}" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">N° Marco:</label>
            <input type="text" name="placas" class="form-control" id="recipient-name" value="{{$parkingCicla->num_marco}}" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asignar puesto:</label>
            <select type="text" name="parking_asigned" class="form-control" id="recipient-name">
                <option selected disable>Seleccione un puesto</option>
                <option value="B-1">B-1</option>
                <option value="B-2">B-2</option>
                <option value="B-3">B-3</option>
                <option value="B-4">B-4</option>
                <option value="B-5">B-5</option>
                <option value="B-6">B-6</option>
                <option value="B-7">B-7</option>
                <option value="B-8">B-8</option>
                <option value="B-9">B-9</option>
                <option value="B-10">B-10</option>
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