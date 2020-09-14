<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditRole-{{$role->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['RoleController@update', $role->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditRole-{{$role->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Editar grupo de usuarios</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('group.update', $role->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del grupo:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$role->name}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nivel del grupo:</label>
            <input type="number" name="nivel" class="form-control" id="recipient-name" value="{{$role->label}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado del grupo:</label>
            <select type="text" name="estado" class="form-control" id="recipient-name">
            @if($role['role_estado']===1)           
              <option selected  value="1">Activo</option>          
              <option value="0">Inactivo</option>
            @else    
                <option selected  value="0">Inactivo</option>
                <option value="1">Activo</option>
            @endif
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}