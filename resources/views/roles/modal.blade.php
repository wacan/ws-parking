<button type="button" class="btn btn-info pull-rght" data-toggle="modal" data-target="#addRole" style="float: right;">Agregar grupo</button>

{!! Form::open(['url' => 'group']) !!}
{{Form::token()}}
<div class="modal fade" id="addRole" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Nuevo grupo de usuarios</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del rol:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ingrese el nombre del rol">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nivel del grupo:</label>
            <input type="number" name="nivel" class="form-control" id="recipient-name" placeholder="Ingrese el nivel del rol">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado del rol:</label>
            <select type="text" name="estado" class="form-control" id="recipient-name">
              <option selected disable>Selecione un estado...</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
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