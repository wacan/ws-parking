@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">           
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                 <span>Registrar Bicicletas</span>
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
                <form action="/bicicletas" method="POST" enctype="multipart/form-data" >
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
                                <label>Marca</label>
                                <input type="text" class="form-control" name="marca" placeholder="Escriba la marca" onkeyup="this.value=this.value.toUpperCase()">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>N° marco</label>
                                <input type="text" class="form-control" name="num_marco" placeholder="N° marco" onkeyup="this.value=this.value.toUpperCase()">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Color bicicleta</label>
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
                                <label>Tipo de Bicicleta</label>
                                <select name="tipo" class="form-control" required>
                                    <option selected disable>Seleccione el tipo...</option>
                                    <option value="Bmx">Bmx</option>
                                    <option value="De ruta">De ruta</option>
                                    <option value="Electrica">Electrica</option>
                                    <option value="Fat bike">Fat bike</option>                                 
                                    <option value="Fixe">Fixe</option>
                                    <option value="Hibirda(ruta y montaña)">Hibirda(ruta y montaña)</option>
                                    <option value="Todo terreno">Todo terreno</option>
                                    <option value="Playera">Playera</option>
                                    <option value="Plegable">Plegable</option>
                                    <option value="Turismera">Turismera</option>                                     
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="button" onclick="location='{{ url('/motos') }}'" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection