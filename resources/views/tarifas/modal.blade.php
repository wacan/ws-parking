<button type="button" class="btn btn-info pull-rght" data-toggle="modal" data-target="#addTarifa" style="float: right;">Agregar tarifa</button>

{!! Form::open(['url' => 'tarifas']) !!}
{{Form::token()}}
<div class="modal fade" id="addTarifa" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Nueva tarifa</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Clase vehículo:</label>
            <input type="text" name="tipo_vehiculo" class="form-control" id="recipient-name" placeholder="Ingresar calse de vehículo">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio tarifa:</label>
            <input type="number" name="tarifa_fija" class="form-control" id="recipient-name" placeholder="Ingresar precio">
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