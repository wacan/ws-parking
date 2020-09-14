<button type="button" class="btn btn-info pull-rght" data-toggle="modal" data-target="#addParking" style="float: right;">Agregar estacionamiento</button>

{!! Form::open(['url' => 'parking']) !!}
{{Form::token()}}
<div class="modal fade" id="addParking" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Nuevo estacionamiento</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del estacionamiento:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ingresar nombre" onkeyup="this.value=this.value.toUpperCase()">
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