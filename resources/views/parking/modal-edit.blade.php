<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditParking-{{$parking->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['ParkingController@update', $parking->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditParking-{{$parking->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Editar estacionamiento</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('parking.update', $parking->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre estacionamiento:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$parking->name}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Reservar estacionamiento:</label>
            <select type="text" name="estado" class="form-control" id="recipient-name">
            @if($parking['estado']===1)           
              <option selected  value="1">Asignado</option>          
              <option value="0">Libre</option>
            @else    
                <option selected  value="0">Libre</option>
                <option value="1">Asignado</option>
            @endif
            </select>
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