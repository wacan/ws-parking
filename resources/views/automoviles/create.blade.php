@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">           
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                 <span>Registrar Automovil</span>
            </strong>                
        </div>
        <div class="col-sm-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
        </div>
        <div class="panel-body">
            <div class="col-md-12">    
                <form action="/automoviles" method="POST" enctype="multipart/form-data" >
                        @csrf <!--este codiguito es el token-->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nombres propietario</label>
                                <input type="text" class="form-control" name="name" placeholder="Escribir nombres">
                            </div>           
                            <div class="form-group col-md-6">
                                <label>Apellidos propietario</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Escribir apellidos">
                            </div>
                        </div>    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>N° de identificación</label>
                                <input type="number" class="form-control" name="identificacion" placeholder="Escriba su identificación">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Modelo auto</label>
                                <input type="text" class="form-control" name="modelo" placeholder="Escriba el modelo" onkeyup="this.value=this.value.toUpperCase()">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Placas auto</label>
                                <input type="text" class="form-control" name="placas" placeholder="N° placas" onkeyup="this.value=this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Color auto</label>
                                <input type="text" name="color" class="form-control" placeholder="Ingrese el color">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Fecha ingreso</label>
                                <input type="date" class="form-control" name="fechaIngreso">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Hora ingreso</label>
                                <input type="time" name="horaIngreso" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                                <label>Tipo de auto</label>
                                <select name="tipo" class="form-control" required>
                                    <option selected disable>Seleccione el tipo...</option>
                                    <option value="Camion">Camion</option>
                                    <option value="Camioneta">Camioneta</option>
                                    <option value="Familiar pequeño">Familiar pequeño</option>
                                    <option value="Minivan">Minivan</option>
                                    <option value="Vans">Vans</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="button" onclick="location='{{ url('/automoviles') }}'" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection